@extends('backoffice/emails/layouts/default')


	
	<html xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">
	<table bgcolor="#4497A6" style="padding:10px;background-color:#4497A6;" border="0" cellpadding="0" width="100%">
		<tr>
			<td>

				<!-- HEADER -->
				<table bgcolor="#FFFFFF" style="table-layout:fixed;border-collapse:collapse;background-color:#FFFFFF;" border="0" cellpadding="0" width="100%">
					<tr>
						<td>
							<div style="width:100%;"><img height="278" style="max-width:100%;" src="http://255dobonfim.pt/backoffice/img/emails/header.png"></div>
						</td>
					</tr>
							
				</table>


				

				
				<!-- MENSAGEM -->
				<table bgcolor="#FFFFFF" style="table-layout:fixed;border-collapse:collapse;padding:60px 55px;background-color:#FFFFFF;" border="0" cellpadding="0" width="100%">
					<tr>
						<td>
							<div style="font-family:Open Sans;font-style:normal;font-weight:normal;font-size:15px;line-height:24px;color:#000;padding:60px 55px;">{!! $dados['mensagem'] !!}</div>
						</td>
					</tr>
				</table>
				<!-- BOTAO -->
				<table bgcolor="#FFFFFF" cellpadding="0" cellspacing="0" class="nl-container" role="presentation" style="table-layout: fixed; vertical-align: top; min-width: 320px; Margin: 0 auto; border-spacing: 0; border-collapse: collapse; mso-table-lspace: 0pt; mso-table-rspace: 0pt; background-color: #FFFFFF; width: 100%;padding-bottom:10px;" valign="top" width="100%">

					<tr style="vertical-align: top;" valign="top" align="center">
						<td style="word-break: break-word; vertical-align: top; border-collapse: collapse;" valign="top">	
						
							<!--[if (!mso)&(!IE)]><!-->
							<div style="border-top:0px solid transparent; border-left:0px solid transparent; border-bottom:0px solid transparent; border-right:0px solid transparent; padding-top:10px; padding-bottom:10px; padding-right: 0px; padding-left: 0px;">
							<!--<![endif]-->
							<div align="center" class="button-container" style="padding-top:0px;padding-right:30px;padding-bottom:30px;padding-left:30px;width:75px;">
							<!--[if mso]><table width="100%" cellpadding="0" cellspacing="0" border="0" style="border-spacing: 0; border-collapse: collapse; mso-table-lspace:0pt; mso-table-rspace:0pt;"><tr><td style="padding-top: 0px; padding-right: 30px; padding-bottom: 30px; padding-left: 30px" align="center"><v:roundrect xmlns:v="urn:schemas-microsoft-com:vml" xmlns:w="urn:schemas-microsoft-com:office:word" href="http://255dobonfim.pt" style="height:31.5pt; width:75pt; v-text-anchor:middle;" arcsize="96%" stroke="false" fillcolor="#4497A6"><w:anchorlock/><v:textbox inset="0,0,0,0"><center style="color:#ffffff; font-family:'Trebuchet MS', Tahoma, sans-serif; font-size:16px"><![endif]-->
							<a href="http://255dobonfim.pt" target="_blank"><div style="text-decoration:none;display:block;color:#ffffff;background-color:#4497A6;border-radius:40px;-webkit-border-radius:40px;-moz-border-radius:40px;width:100%; width:calc(100% - 2px);border-top:1px solid #4497A6;border-right:1px solid #4497A6;border-bottom:1px solid #4497A6;border-left:1px solid #4497A6;padding-top:5px;padding-bottom:5px;font-family:'Montserrat', 'Trebuchet MS', 'Lucida Grande', 'Lucida Sans Unicode', 'Lucida Sans', Tahoma, sans-serif;text-align:center;mso-border-alt:none;word-break:keep-all;">
								<span style="padding-left:5px;padding-right:5px;font-size:16px;display:inline-block;">
								<span style="font-size: 16px; line-height: 32px;color:#ffffff;">VISITAR</span>
								</span>
							</div></a>
							<!--[if mso]></center></v:textbox></v:roundrect></td></tr></table><![endif]-->
							</div>
							</div>
					
						</td>
					</tr>
				</table>
				<!-- TEXTO -->
				<table bgcolor="#FFFFFF" style="background-color:#ffffff;text-align: center;padding-bottom:30px;font-size:12px;line-height:16px;table-layout:fixed;border-collapse:collapse;background-color:#fff;font-family:'Open Sans',sans-serif;font-weight:300;" border="0" cellpadding="0" width="100%">
					<tr align="center">
						<td>
							<div style="padding-bottom:30px;">Se o botão não funcionar copie e cole o seguinte <br>link no seu navegador de internet:<br><a style="text-decoration:none;color:#4497A6;" href="http://255dobonfim.pt">http://255dobonfim.pt</a></div> 
						</td>
						
					</tr>
					
				</table>

				<table bgcolor="#FFFFFF" style="background-color:#ffffff;text-align:center;padding-bottom:50px;font-size:12px;line-height:16px;font-family:Open Sans;font-weight:300;table-layout:fixed;border-collapse:collapse;background-color:#fff;" border="0" cellpadding="0" width="100%">
					<tr align="center">
						<td>
							<div style="padding-bottom:50px;">Para ter a certeza que recebe sempre os nossos e-mails <br>e notificações, adicione o nosso e-mail aos seus contactos:<br><a style="text-decoration:none;color:#4497A6;" href="mailto:mail@255dobonfim.pt"> mail@255dobonfim.pt</a></div> 
						</td>
					</tr>
				</table>

				<table bgcolor="#FFFFFF" style="background-color:#ffffff;text-align:center;padding-bottom:50px;font-size:12px;line-height:25px;font-family:Open Sans;font-weight:300;table-layout:fixed;border-collapse:collapse;background-color:#fff;" border="0" cellpadding="0" width="100%">
					<tr align="center">
						<td>
							<div style="padding-bottom:50px;">
								<a style="color:#4497A6;text-decoration:none;font-size:12px;line-height:14px;" href="http://255dobonfim.pt">www.255dobonfim.pt</a>
						      	<br>
						      	<a href="https://www.linkedin.com/showcase/255dobonfim" target="_blank"><img height="18" src="http://255dobonfim.pt/img/email/linkedin_255.png"></a> 
							</div>
							
					    </td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	

	

