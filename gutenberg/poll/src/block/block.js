import './style.scss';
import './editor.scss';

const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const { SelectControl, TextControl } = wp.components;
const { RichText } = wp.editor ;

var dropdownOptions = false;
var previewBlockOsTitle;
var previewBlockOsImageUrl;
var previewBlockOsView;
var previewBlockOsEdit;
var previewBlockOsStatistics;
var options; 

    registerBlockType( 'opinion-stage/block-os-poll', {
        title: __( 'Poll' ), 
        icon: 'chart-bar',
        category: 'opinion-stage',        
        keywords: [
            __( 'Opinion Stage Poll' ),
            __( 'Opinion Stage Poll' ),
        ],        
        attributes: {
            embedUrl: {
                source: 'attribute',
                attribute: 'data-test-url',
                selector: 'div[data-test-url]'
            },
            oswpUrlShortcode: {
                source: 'attribute',
                attribute: 'data-test-url',
                selector: 'div[data-test-url]'
            },
            lockEmbed: {
                source: 'attribute',
                attribute: 'data-lock-embed',
                selector: 'div[data-lock-embed]'
            },
            buttonText: {
                source: 'attribute',
                attribute: 'data-button-text',
                selector: 'div[data-button-text]'
            },        
        },
        edit: function( props ) {
            let {attributes: {embedUrl, oswpUrlShortcode, lockEmbed, buttonText}, setAttributes} = props;
            const onDropdownChange = val => {
                if(val == ''){
                    props.setAttributes({ embedUrl: '' });
                }else if(val != ''){
                    props.setAttributes({ embedUrl: val });
                    for (var i = 0; i < dropdownOptions.length; i++) {
                        var getLandingPageUrlOs = function(href) {
                            var locationUrlOS = document.createElement("a");
                            locationUrlOS.href = href;
                            return locationUrlOS;
                        };
                        var locationUrlOS = getLandingPageUrlOs(dropdownOptions[i].attributes['landing-page-url']);
                        var matchValue = locationUrlOS.pathname;
                        if(val == matchValue){
                            previewBlockOsTitle = dropdownOptions[i].attributes['title'];
                            previewBlockOsImageUrl = dropdownOptions[i].attributes['image-url'];
                            previewBlockOsView = dropdownOptions[i].attributes['landing-page-url'];
                            previewBlockOsEdit = dropdownOptions[i].attributes['edit-url'];
                            previewBlockOsStatistics = dropdownOptions[i].attributes['stats-url'];                            
                            break;
                        }
                    }                    
                }else{   
                }
            };
            const onEmbedButtonClick = event => {
                if( event.target.value == "Embed" ){
                    if(embedUrl == '' || embedUrl == 'Select' || embedUrl == 'createNew' || embedUrl == 'refresh'){                      
                        props.setAttributes({ lockEmbed: false, buttonText: "Embed" });
                    }else{
                        props.setAttributes({ lockEmbed: true, buttonText: "Change" }); 
                        contentDropdown = (<SelectControl id="selectID" options={options}  value={embedUrl} onChange={onDropdownChange} className="components-select-control__input" />);
                    }
                }else{
                    props.setAttributes({ lockEmbed: false, buttonText: "Embed" });
                }                
            };

            window.verifyOSInsert = function(widget){
                props.setAttributes({ oswpUrlShortcode: widget });
                var myOpts = document.getElementById('selectID').options;
                for(var i = 0; i < myOpts.length; i++){                    
                    if(myOpts[i].value == widget){
                        myOpts[i].defaultSelected = true;
                        props.setAttributes({ lockEmbed: true, buttonText: "Change", embedUrl: widget });
                        break;
                    }
                } 
            }

            var getOsCreateButtonClickUrl = osGutenData.onCreateButtonClickOs+'?w_type=poll&amp;utm_source=wordpress&amp;utm_campaign=WPMainPI&amp;utm_medium=link&amp;o=wp35e8';
            const onCreateButtonClick = value => {
                // Open Create new poll link in new page
                window.open(getOsCreateButtonClickUrl, '_blank').focus();
            };

            if(!buttonText){
                props.setAttributes({ buttonText: 'Embed' });
            }

            var getCallBackUrlOs = osGutenData.callbackUrlOs;
            var callback_url = getCallBackUrlOs;
            var formActionUrlOS = osGutenData.getActionUrlOS;
            var getlogoImageLinkOs = osGutenData.getLogoImageLink;
            const onConnectOSWPButtonClick = value => {
                // Open Connect to opinionstage
                window.location.replace(callback_url);
            };
            // Populate list ajax function
            function OsPolulateList() {          
                var opinionStageWidgetVersion = osGutenData.OswpPluginVersion;
                var opinionStageClientToken = osGutenData.OswpClientToken;
                var opinionstageFetchDataUrl = osGutenData.OswpFetchDataUrl+'?type=poll&page=1&per_page=99';
                fetch(opinionstageFetchDataUrl, {
                    method: "GET",
                    headers: {
                        'Accept':'application/vnd.api+json',
                        'Content-Type':'application/vnd.api+json',
                        'OSWP-Plugin-Version':opinionStageWidgetVersion,
                        'OSWP-Client-Token': opinionStageClientToken
                    },
                })
                .then(async res => {
                    var data = await res.json();
                    data = data.data;
                    dropdownOptions = data;
                    // force reprinting instead!!
                    props.setAttributes({ buttonText: 'Embed'});
                    props.setAttributes({ buttonText: buttonText});
                    if(buttonText == 'Change' && embedUrl !='Select'){
                        props.setAttributes({ embedUrl: embedUrl });
                    }else{ 
                        props.setAttributes({ embedUrl: 'Select' });
                    }                    
                })
                .catch(function(err) {
                    console.log('ERROR: ' + err.message);
                });
            }
            // Checking for Opinion Stage connection
            if(osGutenData.isOsConnected == ''){
                $(document).ready(function () {
                    $('span#oswpLauncherContentPopuppoll , #owspLaunchInputCreate').live('click', function(e) {
                        e.preventDefault();
                        setTimeout(function(){$('.editor-post-save-draft').trigger('click');},500);
                    });               
                });                
                return (
                    <div className={ props.className }>
                        <div className="os-poll-wrapper components-placeholder">
                            <p className="components-heading"><span><img src={getlogoImageLinkOs} alt=""/></span> Opinion Stage</p>
                            <p className="components-heading">Please connect Opinion Stage to WordPress to start adding polls</p>
                            <button className="components-button is-button is-default is-block is-primary" onClick={onConnectOSWPButtonClick}>Connect</button>
                        </div>          
                    </div>
                );
            }else{                
                if(dropdownOptions == false){   
                    options = [{value:'Select',label:'Select a poll'},{value:'refresh',label:'Refresh'}];               
                    OsPolulateList();
                   }else{
                    options = [{value:'Select',label:'Select a poll'},{value:'refresh',label:'Refresh'},{value:'',label:'-----------------'}];
                    for (var i = 0; i < dropdownOptions.length; i++) {
                        options[options.length] = {
                            value: dropdownOptions[i].attributes['landing-page-url'].replace('https://www.opinionstage.com',''),
                            label: dropdownOptions[i].attributes['title'],
                        };    
                        var getLandingPageUrlOs = function(href) {
                            var locationUrlOS = document.createElement("a");
                            locationUrlOS.href = href;
                            return locationUrlOS;
                        };
                        var locationUrlOS = getLandingPageUrlOs(dropdownOptions[i].attributes['landing-page-url']);
                        var matchValue = locationUrlOS.pathname;        
                        if(embedUrl == matchValue){
                            previewBlockOsTitle = dropdownOptions[i].attributes['title'];
                            previewBlockOsImageUrl = dropdownOptions[i].attributes['image-url'];
                            previewBlockOsView = dropdownOptions[i].attributes['landing-page-url'];
                            previewBlockOsEdit = dropdownOptions[i].attributes['edit-url'];
                            previewBlockOsStatistics = dropdownOptions[i].attributes['stats-url'];
                            var previewBlockOsWidgetID = dropdownOptions[i].id;

                        }                          
                    }                   
                }              
                if(embedUrl == 'refresh'){                                       
                    OsPolulateList();   
                }            
                var contentDropdown = (<SelectControl id="selectID" options={options} value={embedUrl}  onChange={onDropdownChange} className="components-select-control__input" />);
                $(document).ready(function () {
                    $('span#oswpLauncherContentPopuppoll').live('click', function(e) {
                        e.preventDefault();
                        setTimeout(function(){$('.editor-post-save-draft').trigger('click');},500);
                        var text = $(this).attr('data-os-block');
                        $("button#dropbtn span").text(text);   
                        var inputs = $(".filter__itm");                                                                  
                        for(var i = 0; i < inputs.length; i++){
                            if($(inputs[i]).text() == text){
                                setTimeout(function(){$(inputs[i]).trigger('click');},2000);
                                $('button.content__links-itm').live('click', function(e) {
                                    $('.tingle-modal.opinionstage-content-popup').hide();
                                    $('.tingle-modal.opinionstage-content-popup.tingle-modal--visible').hide();
                                }); 
                                break;  
                            }
                        }
                    });               
                });

                var contentViewEditStatOs = ( 
                        <div className="os-poll-wrapper components-placeholder">
                        <p className="components-heading"><span><img src={getlogoImageLinkOs} alt=""/></span> Opinion Stage</p>                        
                        <span id="oswpLauncherContentPopuppoll" className="components-button is-button is-default is-block is-primary" data-opinionstage-content-launch data-os-block="poll">Select a Poll</span>
                        <input type="button" value="Create a New Poll" className="components-button is-button is-default is-block is-primary" onClick={onCreateButtonClick} />
                            <div className="components-placeholder__fieldset">
                                {contentDropdown}
                                <input type="button" value={buttonText} className="components-button is-button is-default is-large" id="clickMe" onClick={onEmbedButtonClick} />  
                            </div>
                        </div>       
                    ); 
                           
            var dataOpinionStageEmbedUrl = 'https://www.opinionstage.com/api/v1/widgets/'+embedUrl+'/code.json?comments=true&amp;sharing=true&amp;recommendations=false&amp;width=';
                var OpinionStageDataIframe = 'https://www.opinionstage.com/'+embedUrl+'?wid=0&amp;em=1&amp;comments=null&amp;referring_widget='+embedUrl+'&amp;autoswitch=1&amp;of=&amp;os_utm_source=null';
                (function(d, s, id){
                  var js,
                      fjs = d.getElementsByTagName(s)[0],
                      r = Math.floor(new Date().getTime() / 1000000);
                  if (d.getElementById(id)) {return;}
                  js = d.createElement(s); js.id = id; js.async=1;
                  js.src = "https://www.opinionstage.com/assets/loader.js?" + r;
                  fjs.parentNode.insertBefore(js, fjs);
                }(document, 'script', 'os-widget-jssdk'));
                previewBlockOsWidgetID = 'os-widget-'+previewBlockOsWidgetID;
                  
                if(embedUrl != '' && embedUrl  != 'Select' && embedUrl){
                    if(buttonText == 'Embed'){ 
                        contentViewEditStatOs
                    }else if(buttonText == 'Change'){   
                        contentViewEditStatOs = (
                           <div className="os-poll-wrapper components-placeholder"> 
                              <p className="components-heading"><span><img src={getlogoImageLinkOs} alt=""/></span> Opinion Stage</p>                       
                              <div className="components-preview__block" >                            
                                 <div className="components-preview__leftBlockImage">
                                    <img src={previewBlockOsImageUrl} alt={previewBlockOsTitle} className="image" />
                                    <div className="overlay">
                                       <div className="text">
                                          <a href={previewBlockOsView} target="_blank"> View </a>
                                          <a href={previewBlockOsEdit} target="_blank"> Edit </a>
                                          <a href={previewBlockOsStatistics} target="_blank"> Statistics </a>
                                          <input type="button" value={buttonText} className="components-button is-button is-default is-large left-align" onClick={onEmbedButtonClick} />
                                       </div>                                            
                                    </div>
                                 </div>
                                 <div className="components-preview__rightBlockContent">
                                    <div className="components-placeholder__label">Poll: {previewBlockOsTitle}</div>      
                                 </div>
                              </div>
                           </div>
                        );                            
                    contentDropdown = (<SelectControl id="selectID" options={options} value={embedUrl} disabled onChange={onDropdownChange} className="components-select-control__input" />);
                    }
                }else if(embedUrl == 'Select' || embedUrl == '' || embedUrl == 'refresh'){
                    contentViewEditStatOs
                }else{  
                    props.setAttributes({ buttonText: 'Embed'});
                        contentViewEditStatOs 
                }
                

                return (         
                    <div className={ props.className }>                                                             
                        {contentViewEditStatOs}  
                    </div>
                );
            }
        },
        save: function( {attributes: {embedUrl, oswpUrlShortcode, lockEmbed, buttonText}} ) {
            return (
                <div class="os-poll-wrapper" data-type="poll" data-test-url={oswpUrlShortcode} data-lock-embed={lockEmbed} data-button-text={buttonText}>
                    [os-widget path="{oswpUrlShortcode}"]
                </div>
            );
        },
    } );