<style>.tooltip,[data-tooltip]{position:relative;cursor:pointer}.tooltip:after,.tooltip:before,[data-tooltip]:after,[data-tooltip]:before{position:absolute;visibility:hidden;-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";filter:alpha(Opacity=0);opacity:0;-webkit-transition:opacity .2s ease-in-out,visibility .2s ease-in-out,-webkit-transform .2s cubic-bezier(.71,1.7,.77,1.24);-moz-transition:opacity .2s ease-in-out,visibility .2s ease-in-out,-moz-transform .2s cubic-bezier(.71,1.7,.77,1.24);transition:opacity .2s ease-in-out,visibility .2s ease-in-out,transform .2s cubic-bezier(.71,1.7,.77,1.24);-webkit-transform:translate3d(0,0,0);-moz-transform:translate3d(0,0,0);transform:translate3d(0,0,0);pointer-events:none}.tooltip:focus:after,.tooltip:focus:before,.tooltip:hover:after,.tooltip:hover:before,[data-tooltip]:focus:after,[data-tooltip]:focus:before,[data-tooltip]:hover:after,[data-tooltip]:hover:before{visibility:visible;-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=100)";filter:alpha(Opacity=100);opacity:1}.tooltip:before,[data-tooltip]:before{z-index:1001;border:6px solid transparent;background:0 0;content:""}.tooltip:after,[data-tooltip]:after{z-index:1000;padding:8px;width:290px;background-color:#000;background-color:hsla(0,0%,20%,.9);color:#fff;content:attr(data-tooltip);font-size:14px;line-height:1.2}.tooltip-right:after,.tooltip-right:before{bottom:50%;left:100%}.tooltip-right:before{margin-bottom:0;margin-left:-12px;border-top-color:transparent;border-right-color:#000;border-right-color:hsla(0,0%,20%,.9)}.tooltip-right:focus:after,.tooltip-right:focus:before,.tooltip-right:hover:after,.tooltip-right:hover:before{-webkit-transform:translateX(12px);-moz-transform:translateX(12px);transform:translateX(12px)}.tooltip-left:before,.tooltip-right:before{top:3px}.tooltip-left:after,.tooltip-right:after{margin-left:0;margin-bottom:-16px}.tabs{width:100%;display:inline-block}.tab-links{margin:5px 0 0}.tab-links:after{display:block;clear:both;content:''}.tab-links li{margin:0 10px 0 0;float:left;list-style:none}.tab-links a{padding:9px 11px 9px 10px;display:inline-block;border-radius:3px 3px 0 0;background:#e4e4e4;font-size:16px;font-weight:600;color:#4c4c4c;transition:all linear .15s;text-decoration:none;box-shadow:0px -1px 2px rgba(0,0,0,0.2)}.tab-links a:hover{background:#a7cce5;text-decoration:none}li.active a,li.active a:hover{background:#fff;color:#4c4c4c}.tab-content{padding:15px;border-radius:0 3px 3px 3px;box-shadow:0 1px 2px rgba(0,0,0,.15);background:#fff}.tab{display:none}.tab.active{display:block}input[type=radio]{box-shadow:none;}input[type=radio]:checked:before{background:none;}input[type=radio]:checked{border:8px solid #4d7592;}#disable:checked{border:8px solid red;}#tab7 a{text-decoration:none;}#tab7 a:hover{text-decoration:underline;}</style><script>jQuery(document).ready(function(){jQuery(".tabs .tab-links a").on("click",function(e){var a=jQuery(this).attr("href");jQuery(".tabs "+a).fadeIn(400).siblings().hide(),jQuery(this).parent("li").addClass("active").siblings().removeClass("active"),e.preventDefault()})});</script>