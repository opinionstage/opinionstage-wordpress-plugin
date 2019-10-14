SHELL = /bin/bash

-include config.cmake

PLUGIN_FILES = $(shell git ls-files)

VERSION = $(shell grep 'Stable tag' readme.txt | cut -d' ' -f 3)
TARGET = social-polls-by-opinionstage-$(VERSION).zip

$(TARGET): $(PLUGIN_FILES)
	zip $(TARGET) $(PLUGIN_FILES)
.DEFAULT_GOAL = $(TARGET)

svn-update-files: _check-svn-path
	rsync --progress --archive --no-times --delete-after \
	  --exclude=*.zip                         \
	  --exclude=.git*                         \
	  --exclude=Makefile                      \
	  --exclude=*.cmake                       \
	  --filter='protect .git*'                \
	  --filter='protect Makefile'             \
	  --filter='protect *.cmake'              \
	  . "$(SVN_REPO_PATH)/trunk/"
.PHONY: svn-update-files

svn-commit-version: _check-svn-path
	svn commit --message="update code" $(SVN_REPO_PATH)
.PHONY: svn-commit-version

svn-create-tag: _check-svn-path
	svn copy $(SVN_REPO_PATH)/trunk $(SVN_REPO_PATH)/tags/$(VERSION)
.PHONY: svn-create-tag

svn-commit-tag: _check-svn-path
	svn commit --message="$(VERSION) release" $(SVN_REPO_PATH)
.PHONY: svn-commit-tag

git-commit-tag:
	git tag v$(VERSION)
.PHONY: git-commit-tag

_check-svn-path:
	@if [[ ! -d "$(SVN_REPO_PATH)" ]]; then \
	  echo "path to svn repo \"$(SVN_REPO_PATH)\" does not exist, create config.cmake file and set path there: SVN_REPO_PATH = path/to/svn (NOTE: no trailing /)"; \
	  exit 1;                               \
	fi
.PHONY: _check-svn-path

show-version:
	@echo current version is $(VERSION)
.PHONY: show-version

clean:
	-$(RM) -r assets/*/node_modules
	-$(RM) *.zip
.PHONY: clean
