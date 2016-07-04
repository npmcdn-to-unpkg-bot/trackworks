//Plugin Name: JV Posts
//Plugin URI: http://joomlavi.com
//Description: Plugin JV Posts to show custom posts 
//Version:1.0
//Author: Joomlavi
//Author URI:http://joomlavi.com
//License: A "Slug" license name e.g. GPL2
				function getXMLHttpRequest() {
							var xRequest=null;
							if (window.XMLHttpRequest) {xRequest=new XMLHttpRequest();}
							else if (typeof ActiveXObject != "undefined"){xRequest=new ActiveXObject("Microsoft.XMLHTTP");}
							return xRequest;} 
							
							
				function getbyid(getid,getpage,url){
					var xmlhttp=getXMLHttpRequest();
					xmlhttp.onreadystatechange=function(){
						if (xmlhttp.readyState==4 && xmlhttp.status==200)
							{
									jQuery("#"+getid).html(xmlhttp.responseText);
									 xmlhttp.close;
							}
														  }
					if(url=="")
						url="?rd="+ Math.random();
					else
						url="?" + url + "&rd="+ Math.random();
					 xmlhttp.open("GET",getpage+url,true);
					 xmlhttp.send();
														}
														
					function postbyurl(getid,getpage,url,loading){
					var xmlhttp=new getXMLHttpRequest();
					xmlhttp.onreadystatechange=function(){
						if (xmlhttp.readyState==4 && xmlhttp.status==200)
							{		
												document.getElementById(getid).style.display="none";
												jQuery("#"+getid).html(xmlhttp.responseText)
												jQuery("#"+getid).fadeIn("100");
												if(loading==1){
													jQuery("#"+getid).removeClass('loading');
												}
												xmlhttp.close;
										
							}
					}
					if(url=="")
						params="?rd="+ Math.random();
					else
						params="?&" + url;
						var url1="?rd=" + Math.random();
						xmlhttp.open("POST",getpage,true);
						xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
						//xmlhttp.setRequestHeader("Content-length", params.length);
						//xmlhttp.setRequestHeader("Connection", "close");
						xmlhttp.send(params);
						if(loading!=null)		
							{jQuery("#"+getid).html("<img src=" + wnm_labory_p_url.p_url + loading + ".gif />"); 
								if(loading==1){
									jQuery("#"+getid).addClass('loading');
								}
							}
																						
														}
														
	//===========================================================================================================================================================													
						function postall_or(getid,getpage,url,loading){
						var xmlhttp=new getXMLHttpRequest();
						xmlhttp.onreadystatechange=function(){
							   if (xmlhttp.readyState==4 && xmlhttp.status==200)
							   			{			
															document.getElementById(getid).style.display="none";
															jQuery("#"+getid).html(xmlhttp.responseText);
															jQuery("#"+getid).fadeIn("100");
															if(loading==1){
																jQuery("#"+getid).removeClass('loading');
															}
															xmlhttp.close;
													
										}//if
						}//function
						var mang=url.split("||");
						var sopt=mang.length;
						params="?";
						for(i=0;i<=sopt-1;i++)
						{
							params=params + "&" + mang[i] + "=" + document.getElementById(mang[i]).value ;}
						 var url1="?rd=" + Math.random();
						xmlhttp.open("POST",getpage,true);
						xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
						//xmlhttp.setRequestHeader("Content-length", params.length);
						//xmlhttp.setRequestHeader("Connection", "close");
						xmlhttp.send(params);
						if(loading!=null)		
							{
								jQuery("#"+getid).html("<img src=" + wnm_labory_p_url.p_url + loading + ".gif />"); 
								if(loading==1){
									jQuery("#"+getid).addClass('loading');
								}
							}
											
					}