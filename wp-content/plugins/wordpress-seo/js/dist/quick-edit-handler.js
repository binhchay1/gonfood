jQuery(function(t){const n=t(location).attr("pathname").split("/").pop(),i="edit-tags.php"===n?"slug":"post_name",e=t(".wrap").children().eq(0);let o=0;const a=[];function r(n){a.includes(n)||(a.push(n),t(n).insertAfter(e))}function c(){t.post(ajaxurl,{action:"yoast_get_notifications",version:2},(function(t){""!==t&&(o=0,JSON.parse(t).map(r)),o<20&&""===t&&(o++,setTimeout(c,500))}))}function u(){const n=t("tr.inline-editor"),e=function(t){return 0===t.length||""===t?"":t.attr("id").replace("edit-","")}(n),o=function(n){return t("#inline_"+n).find("."+i).html()}(e);return o!==n.find("input[name="+i+"]").val()}["edit.php","edit-tags.php"].includes(n)&&(t("#inline-edit input").on("keydown",(function(t){13===t.which&&u()&&c()})),t(".button-primary").on("click",(function(n){"save-order"!==t(n.target).attr("id")&&u()&&c()}))),"edit-tags.php"===n&&t(document).on("ajaxComplete",(function(t,n,i){i.data.indexOf("action=delete-tag")>-1&&c()}))}(jQuery));