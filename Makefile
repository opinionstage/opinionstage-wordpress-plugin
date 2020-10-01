SHELL = /bin/bash

-include config.mk

PLUGIN_FILES = $(shell git ls-files)

VERSION = $(shell grep 'Stable tag' readme.txt | cut -d' ' -f 3)
TARGET = social-polls-by-opinionstage-$(VERSION).zip

all: $(TARGET)

$(TARGET): $(PLUGIN_FILES)
	zip $(TARGET) $(PLUGIN_FILES)

# release steps:
#
# 1. sync files into svn trunk folder:
#      make svn-update-files
#    if some unexpected files was copied, rollback svn to clean state: svn cleanup . --remove-unversioned
#    if some files need revert: svn revert . --recursive
#    add files to --exclide list and repeat
# 2. add/remove all new/removed files in svn
#      svn add --force .
#      svn rm ..
# 3. commit those files (will publish files as well):
#      make svn-commit-version
# 4. create tag in svn (locally), by copying trunk/ files into appropriate tags/ folder
#      make svn-create-tag
# 5. publish tag to svn:
#      make svn-commit-tag
# 6. publish git tag to github
#      make git-commit-tag && git push --tags
svn-update-files: _check-svn-path
	rsync --progress --archive --no-times --delete-after \
	  --exclude=*.zip                         \
	  --exclude=.git*                         \
	  --exclude=.circleci/                    \
	  --exclude=.editorconfig                 \
	  --exclude=Makefile                      \
	  --exclude=*.mk                          \
	  --exclude=.nvmrc                        \
	  --exclude=node_modules/                 \
	  --exclude=composer.json                 \
	  --exclude=composer.lock                 \
	  --exclude=vendor/                       \
	  --filter='protect .git*'                \
	  --filter='protect Makefile'             \
	  --filter='protect *.mk'                 \
	  . "$(SVN_REPO_PATH)/trunk/"
.PHONY: svn-update-files

svn-commit-version: _check-svn-path
	svn commit --message="update code" $(SVN_REPO_PATH)
.PHONY: svn-commit-version

svn-create-tag: _check-svn-path
	svn copy $(SVN_REPO_PATH)/trunk $(SVN_REPO_PATH)/tags/$(VERSION)
.PHONY: svn-create-tag

# FIXME: fails for some reason:
#   svn commit --message="19.6.32 release" ../../os-wp-plugin-svn
#   svn: E175002: Commit failed (details follow):
#   svn: E175002: Unexpected HTTP status 502 'Bad Gateway' on '/!svn/me'
#   make: *** [svn-commit-tag] Error 1
svn-commit-tag: _check-svn-path
	svn commit --message="$(VERSION) release" $(SVN_REPO_PATH)
.PHONY: svn-commit-tag

git-commit-tag:
	git tag v$(VERSION)
.PHONY: git-commit-tag

show-version:
	@echo current version is $(VERSION)
.PHONY: show-version

# Performs lint checks for all files or specific file
# Usage:
# lint all files:
#   make lint
# lint specific file:
#   make lint file=path/to/file.php
lint:
	@./vendor/bin/phpcs \
	  --standard=WordPress \
	  --ignore=assets/*,vendor/*,*.css,*.js \
	  -s \
	  $$([ "$(file)" != "" ] && echo "$(file)" || echo .)
.PHONY: lint

# Autocorrects all found lint issues for specific file
# Usage:
#   make lint-autocorrect file=path/to/file.php
lint-autocorrect:
	@./vendor/bin/phpcbf \
	  --standard=WordPress \
	  --ignore=assets/*,vendor/*,*.css,*.js \
	  -s \
	  $(file)
.PHONY: lint-autocorrect

clean:
	-$(RM) -r assets/*/node_modules
	-$(RM) *.zip
.PHONY: clean

_check-svn-path:
	@if [[ ! -d "$(SVN_REPO_PATH)" ]]; then \
	  echo "path to svn repo \"$(SVN_REPO_PATH)\" does not exist, create config.mk file and set path there: SVN_REPO_PATH = path/to/svn (NOTE: no trailing /)"; \
	  exit 1;                               \
	fi
.PHONY: _check-svn-path
