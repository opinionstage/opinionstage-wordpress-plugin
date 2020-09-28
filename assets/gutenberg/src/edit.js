import { __ } from '@wordpress/i18n'

import './editor.scss'

const $ = jQuery

var dropdownOptions   = false;
export default function Edit ( props ) {

            // Setting Attributes
            let {attributes: {embedUrl, lockEmbed, buttonText, insertItemImage,insertItemOsTitle,insertItemOsView,insertItemOsEdit,insertItemOsStatistics}, setAttributes} = props;

            // Fetching Localized variables
            var getCallBackUrlOs = OPINIONSTAGE_GUTENBERG_DATA.callbackUrlOs;
            var callback_url = getCallBackUrlOs;
            var formActionUrlOS = OPINIONSTAGE_GUTENBERG_DATA.getActionUrlOS;
            var getlogoImageLinkOs = OPINIONSTAGE_GUTENBERG_DATA.getLogoImageLink;

            // Select Button Click functionality
            const onSelectButtonClick = value => {
                window.verifyOSInsert = function(widget){
                    props.setAttributes({ embedUrl: widget, buttonText:'Change' });

                    var opinionStageWidgetVersion = OPINIONSTAGE_GUTENBERG_DATA.OswpPluginVersion;
                    var opinionStageClientToken = OPINIONSTAGE_GUTENBERG_DATA.OswpClientToken;
                    var opinionstageFetchDataUrl = OPINIONSTAGE_GUTENBERG_DATA.OswpFetchDataUrl+'?type=poll&page=1&per_page=99';
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
                        props.setAttributes({ buttonText: buttonText});
                            
                    })
                    .catch(function(err) {
                        console.log('ERROR: ' + err.message);
                    });
                }
            }

            // Change Button Click functionality
            const onChangeButtonClick = value => {
                    props.setAttributes({ 
                        embedUrl: '', 
                        buttonText:'Embed', 
                        lockEmbed: false, 
                        insertItemImage: false, 
                        insertItemOsTitle: false, 
                        insertItemOsView: false,
                        insertItemOsEdit: false,
                        insertItemOsStatistics: false
                    });
                }

            // Connect to Opinionstage Callback Url
            const onConnectOSWPButtonClick = value => {
                window.location.replace(callback_url);
            };

            // Create New Item Url (Poll)
            var getOsCreateButtonClickUrl = OPINIONSTAGE_GUTENBERG_DATA.onCreateButtonClickOs+'?w_type=poll&amp;utm_source=wordpress&amp;utm_campaign=WPMainPI&amp;utm_medium=link&amp;o=wp35e8';
            const onCreateButtonClick = value => {
                // Open Create new poll link in new page
                window.open(getOsCreateButtonClickUrl, '_blank').focus();
            };
            
            // Checking for Opinion Stage connection
            if(OPINIONSTAGE_GUTENBERG_DATA.isOsConnected == ''){
            // Not Connected to opinionstage
                return (
                    <div className={ props.className }>
                        <div className="os-poll-wrapper components-placeholder">
                            <p className="components-heading"><img src={getlogoImageLinkOs} alt=""/></p>
                            <p className="components-heading">Please connect WordPress to Opinion Stage to start adding polls</p>
                            <button className="components-button is-button is-default is-block is-primary" onClick={onConnectOSWPButtonClick}>Connect</button>
                        </div>    
                        <div></div>      
                    </div>
                );
            }else{
            // Connected to opinionstage
                jQuery(document).ready(function ($) {
                    // Content Popup Launch Working
                    jQuery('body').on('click', '[data-opinionstage-content-launch]', function (event) {
                        event.preventDefault();
                        setTimeout(function(){
                            $('.progress_message').css('display', 'block');
                            $('.content__list').css('display', 'none');
                            var text = $('#oswpLauncherContentPopuppoll').attr('data-os-block');
                            $("button#dropbtn span").text(text); 
                            var inputs = $(".filter__itm");
                            for(var i = 0; i < inputs.length; i++){
                                if($(inputs[i]).text() == text){ 
                                    setTimeout(function(){
                                        $(inputs[i]).trigger('click');
                                        $('.progress_message').css('display', 'none');
                                        $('.content__list').css('display', 'block'); 

                                        $('button.content__links-itm').on('click',null, function(e) {
                                        $('.tingle-modal.opinionstage-content-popup').hide();
                                        $('.tingle-modal.opinionstage-content-popup.tingle-modal--visible').hide();
                                    }); 
                                    },2500);                                                                                         
                                    
                                    break;  
                                }
                                else {
                                    $('.progress_message').css('display', 'block');
                                    $('.content__list').css('display', 'none');
                                }
                            }
                        },1000);
                    });              
                });

                // Fetching Ajax Call Result
                if(dropdownOptions != false){
                    for (var i = 0; i < dropdownOptions.length; i++) {
                        var getLandingPageUrlOs = function(href) {
                        var locationUrlOS = document.createElement("a");
                        locationUrlOS.href = href;
                        return locationUrlOS;
                    };
                    var locationUrlOS = getLandingPageUrlOs(dropdownOptions[i].attributes['landing-page-url']);
                    var matchValue = locationUrlOS.pathname;   
                        if(embedUrl == matchValue){                                                           
                            props.setAttributes({lockEmbed: true, buttonText: "Change" });
                            props.setAttributes({ insertItemImage         : dropdownOptions[i].attributes['image-url'] });
                            props.setAttributes({ insertItemOsTitle       : dropdownOptions[i].attributes['title'] });
                            props.setAttributes({ insertItemOsView        : dropdownOptions[i].attributes['landing-page-url'] });
                            props.setAttributes({ insertItemOsEdit        : dropdownOptions[i].attributes['edit-url'] });
                            props.setAttributes({ insertItemOsStatistics  : dropdownOptions[i].attributes['stats-url'] });
                            break;                                
                        }                          
                    }
                }

                // Content On Editor
                var contentViewEditStatOs = (
                            <div className="os-poll-wrapper components-placeholder">
                                <p className="components-heading"><img src={getlogoImageLinkOs} alt=""/></p>                        
                                <span id="oswpLauncherContentPopuppoll" className="components-button is-button is-default is-block is-primary" data-opinionstage-content-launch data-os-block="poll" onClick={onSelectButtonClick} >Select a Poll</span>
                                <input type="button" value="Create a New Poll" className="components-button is-button is-default is-block is-primary" onClick={onCreateButtonClick} />
                                <span></span>
                            </div>       
                        );

                if(embedUrl != '' && embedUrl){
                    if(buttonText == 'Embed'){ 
                        contentViewEditStatOs
                    }else if(buttonText == 'Change'){                        
                        contentViewEditStatOs = (
                                <div className="os-poll-wrapper components-placeholder"> 
                                    <p className="components-heading"><img src={getlogoImageLinkOs} alt=""/></p>                       
                                    <div className="components-preview__block" >                            
                                        <div className="components-preview__leftBlockImage">
                                            <img src={insertItemImage} alt={insertItemOsTitle} className="image" />
                                            <div className="overlay">
                                            <div className="text">
                                                <a href={insertItemOsView} target="_blank"> View </a>
                                                <a href={insertItemOsEdit} target="_blank"> Edit </a>
                                                <a href={insertItemOsStatistics} target="_blank"> Statistics </a>
                                                <input type="button" value={buttonText} className="components-button is-button is-default is-large left-align" onClick={onChangeButtonClick}/>
                                            </div>                                            
                                        </div>
                                    </div>
                                    <div className="components-preview__rightBlockContent">
                                        <div className="components-placeholder__label">Poll: {insertItemOsTitle}</div>      
                                    </div>
                                </div>
                                <span></span>
                                </div>
                        );                           
                    }
                }else if(embedUrl == '' || jQuery.type(embedUrl) === "undefined"){
                    contentViewEditStatOs
                }else{  
                    props.setAttributes({ buttonText: 'Embed'});
                        contentViewEditStatOs 
                }
                return (
                    <div className={ props.className }>                                                             
                        {contentViewEditStatOs}
                        <span></span> 
                    </div>
                );
            }
        }
