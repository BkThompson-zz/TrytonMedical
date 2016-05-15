/* BW JS starting template for JS / JQuery customizations. All customizations will be stored in the BW_JS object - modify as needed */
window.BW_JS = { wceinit:function(){ var c=document.getElementsByTagName("body")[0].className,p,f,t=c.match(/node-type-(\S+)/i);if(!t){t=c.match(/-in\spage-(\S+)/i);if(t)p=t[1]}else{p='node-type-'+t[1]}

//Customization for all pages here


switch(p){
    
    case 'newsroom-home':
    case 'investors': 

        //customizations for the home page here
    
    break;
    case 'press-releases':
    case 'taxonomy':
        
        //customizations for the press release list view and taxonomy list view here
        
    break;
    case 'node-type-press-release':

        //customizations for the press release node here
        
    break;
    
    /* Additional pages below - uncomment to activate or create new cases
    case 'user':
        
        
    break;
    case 'multimedia':
        
        
    break;
    case 'shareholder-services':
        
        
    break;
    case 'financial-reports':
        
        
    break;
    case 'sec-filings':
        
        
    break;
    case 'stock-information':
        
        
    break;
    case 'events-presentations':
        
        
    break;
    case 'event':
        
        
    break;
    case 'financial-reports':
        
        
    break;
    */

}

}}; $(document).ready(function(){BW_JS.wceinit()});