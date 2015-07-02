<?php 
$pageTitle='Resources';
$pageClass='pg-resources';
include('templates/header.php');
?>
<main>
	<section>
        <div class="page-title">
			<div>
				<h1>Resources: Hardware + Software</h1>
			</div>
        </div>
        
        <div class="sidebar">
        	<ul>
            	<li><a href="#tools">TOOLS</a></li>
                <li><a href="#links" id="links-sidemenu">LINKS</a>
                	<ul>
                    	<li><a href="#">Web Design Blogs</a></li>
                        <li><a href="#">Web Utilities</a></li>
                        <li><a href="#">Online Web Tutorials</a></li>
                        <li><a href="#">Stock Images</a></li>
                        <li><a href="#">Fonts</a></li>
                        <li><a href="#">Website Inspiration</a></li>
						<li><a href="#">Student Services</a></li>                        
                    </ul>
				</li>
                <li><a href="#server-access" id="server-sidemenu">SERVER</a>
					<ul>
						<li><a href="#personal">H: Personal Server</a></li>
						<li><a href="#program">FTP: Program Files</a></li>
						<li><a href="#portfolio">FTP: Portfolio Server</a></li>
						<li><a href="#cpanel">cPanel</a></li>
					</ul>
				</li>
            </ul>
			<button><img src="images/2015twd-compass-website-icon-SideBar-Mobile(vertical)title-01.png"><img src="images/2015twd-compass-website-icon-SideBar-Mobile(vertical)arrow-01.png"></button>
        </div>
        
        <div>
			<div id="tools">
				<div class="book-sideshow">
					<div class="book-image">
						<a href="#"><img src="images/resources-thumbnail-book-sass.png" width="164px" height="252px" alt="SASS Book"/></a>
					</div>
					<button class="prevBook arrow button left"><span>Prev</span></button>
					<button class="nextBook arrow button right"><span>Next</span></button>
					
					<div class="book-title">
						<h3>HTML5 + CSS3</h3>
						<ul>
							<li>SASS for Web Designers</li>
							<li>by Dan Cederholm</li>
						</ul>
						<a href="http://abookapart.com/products/sass-for-web-designers">http://ow.ly/Mgck8</a>
					</div>
				</div>

				<div class="program-sideshow">
					<div class="program-image">
						<a href="#"><img src="images/resources-thumbnail-soft-dw.png" width="172px" height="164px" alt="Dreamweaver Icon"></a>
					</div>
					<button class="prevBook arrow button left"><span>Prev</span></button>
					<button class="nextBook arrow button right"><span>Next</span></button>
					
					<div class="program-title">
						<h3>Code Editing System</h3>
						<ul>
							<li>Dreamweaver CC</li>
							<li>Adobe CC</li>
						</ul>
						<a href="#">http://ow.ly/Me7X5</a>
					</div>
				</div>
			</div>
        
			<div id="links">
				<div class="csstricks">
					<h3>CSS-Tricks</h3>
					<ul> 
						<li>CSS-Tricks launched July 4th, 2007. It used to be, believe it or not, primarily about CSS! Over the years, despite the hokey name, CSS-Tricks has come to become a site about all things web design and development.</li>
						<li>Author of blog: Various (user-submitted).</li>
					</ul>
					<a href="http://www.css-tricks.com">css-tricks.com</a>
				</div>
				
				<div class="css3generator">
					<h3>CSS3 Generator</h3>
					<ul>
						<li>A site that defines various valid properties via syntax-accurate CSS-code using user-friendly point-and-click functions.</li>
						<li>Author: Randy Jensen.</li>
					</ul>
					<a href="http://www.css3generator.com">css3generator.com/</a>
				</div>
				
				<div class="lynda">
					<h3>Lynda.com</h3>
					<ul>
						<li>lynda.com is a leading online learning company that helps anyone learn business, software, technology and creative skills to achieve personal and professional goals. Through individual, corporate, academic and government subscriptions, members have access to the lynda.com video library of engaging, top-quality courses taught by recognized industry experts.</li>
						<li>Author: Various.</li>
					</ul>
					<a href="http://www.lynda.com">www.lynda.com/</a>
				</div>
				
				<div class="link-title">
					<h3>CSS Tricks</h3>
					<ul>
						<li>What topics the blog covers</li>
						<li>Author of blog</li>
					</ul>
					<a href="#">www.websiteurl.com</a>
				</div>
				
				<div class="link-title">
					<h3>CSS Tricks</h3>
					<ul>
						<li>What topics the blog covers</li>
						<li>Author of blog</li>
					</ul>
					<a href="#">www.websiteurl.com</a>
				</div>
				
				 <div class="link-title">
					<h3>CSS Tricks</h3>
					<ul>
						<li>What topics the blog covers</li>
						<li>Author of blog</li>
					</ul>
					<a href="#">www.websiteurl.com</a>
				</div>
				
				<div class="link-title">
					<h3>CSS Tricks</h3>
					<ul>
						<li>What topics the blog covers</li>
						<li>Author of blog</li>
					</ul>
					<a href="#">www.websiteurl.com</a>
				</div>
				
				<div class="link-title">
					<h3>CSS Tricks</h3>
					<ul>
						<li>What topics the blog covers</li>
						<li>Author of blog</li>
					</ul>
					<a href="#">www.websiteurl.com</a>
				</div>
				
				<div class = "link-title">
					<h3>CSS Tricks</h3>
					<ul>
						<li>What topics the blog covers</li>
						<li>Author of blog</li>
					</ul>
					<a href="#">www.websiteurl.com</a>
				</div>
			</div>
        
        
			<div id="server-access">				
				<div class="server-description">
					<div id="overview">
						<h3>Server Overview</h3>
						<p>You have access to the following servers:</p>
						<ul>
							<li>BCIT student servers:</li>
							<ul>
								<li>Personal H:\ Drive for personal files</li>
								<li>TeamShared T:\ for sharing files with classmates</li>
							</ul>
							<li>Program File Server: connected through FTP client for downloading course materials and submitting assignments</li>
							<li>Portfolio Server: connected through FTP client for uploading web site files that can be viewed on the public internet</li>
							<p>In addition to these servers you also have access to a personal web hosting cpanel for accessing portfolio server settings and installing databases.</p>
						</ul>
					</div>
						
					<div id="personal">
						<h3>BCIT Servers</h3>
						<p>The BCIT servers provide personal storage space for your files</p>
						<p>You can access the your personal storage space via FTPthe mapped computer drives under Windows Explorer. Your personal drive is Drive H:\</p>
						<p>To access your personal storage remotely please follow these instruction for off campus access:</p>
						<p>Click here for off campus H:\ drive access instructions</p>
					</div>
						
					<div id="program">
						<h3>Program Server</h3>
						<div>
							<p>With the program server you can:</p>
							<ul>
								<li>Download course material via the course folders</li>
								<li>Submit assignments and projects via the dropbox folders located inside the course folders</li>
							</ul>
							<p>To access the program file server you will need an FTP program such as Filezilla. The instructions on this page use Filezilla.</p>
						</div>
					
						<div>
							<p>How to Access the Program File Server</p>
							<ul>
								<li>Open FileZilla</li>
								<li>Click File, then select Site Manager</li>
								<img src="images/program_server_ftp_instructions_step_02.png" alt="FileZilla Site Manager Picture"/>
								<li>Click "New Site" </li>
								<li>Enter a site name in the left pane (e.g. "program_server")</li>
								<li>Enter the following information under the "General" tab
									<ul>
										<li>Host Name: files.htpwebdesign.ca</li>
										<li>Protocol: FTP - File Transfer Protocol</li>
										<li>Encryption: Use plain FTP</li>
										<li>Logon Type: Normal</li>
										<li>User: the first part of your portfolio web address @files.htpwebdesign.ca
(e.g. - if the first part of your portfolio web address is bkozma then your FTP user name would be bkozma@files.htpwebdesign.ca)</li>
										<li>Password: your student number</li>
									</ul>
								<li>Click "Connect"</li>
								<img src="images/program_server_ftp_instructions_step_03_04_05_06.png" alt="FileZilla Connect Picture" />
								<li>Double click a course folder to download course files or to access the dropbox folder for a course</li>
								<img src="images/program_server_ftp_instructions_step_07.png" alt="FileZilla Folder Picture" />
							</ul>
						</div>
					</div>
                    
                    <div id="portfolio">
                    <h3>Portfolio Server</h3>
                    	<p>Your portfolio website is located at the following URL (In most cases):</p>
<p>http:// (first initial)(lastname).htpwebdesign.ca</p>
<p>e.g. bkozma.htpwebdesign.ca</p>
<p>This is a public web site. anything placed on these servers can be accessed by anyone with an internet connection</p>
<p>To upload files to your website you need to use an FTP client. For the instructions below we have used <a href="http://filezilla-project.org/">Filezilla</a></p>
					<h4>How to Access the Online Portfolio Server</h4>
                    	<ul>
                        <li>Open Filezilla</li>
                        <li>Click on Click File, then select Site Manager...</li>
                        <img src="images/program_server_ftp_instructions_step_02.png" alt="Portfolio Site Manager Picture"/>
                        <li>Click "New Site"</li>
                        <li>Enter a site name in the left pane (e.g. "portfolio_server")</li>
						<li>Enter the following information under the "General" tab</li>
								<ul>
									<li>Host Name: Your portfolio web site address</li>
									<li>Protocol: FTP - File Transfer Protocol</li>
									<li>Encryption: Use plain FTP</li>
									<li>Logon Type: Normal</li>
									<li>User: the first part of your portfolio web address @files.htpwebdesign.ca
(e.g. - if the first part of your portfolio web address is bkozma then your FTP user name would be bkozma@files.htpwebdesign.ca)</li>
									<li>Password: your student number</li>
								</ul>
							<li>Click "Connect"</li>
								<img src="images/portfolio_server_ftp_instructions_step_03_04_05_06.png" alt="FileZilla Connect Picture" />
							<li>Double click the public_html folder open your public web folder. Files for your public web site should go inside the public_html folder</li>
								<img src="images/portfolio_server_step_07.png" alt="FileZilla Folder Picture" />
							</ul>
					</div>

                <div id="cpanel">
                	<p>cPanel is your portfolio site's online control panel. From your cPanel you can create databases as well as manage files for your portfolio web site.</p>
                    <h3>How to Access your cPanel</h3>
                    <li>Open any web browser and navigate to: (your portfolio address)/cpanel
(e.g. - if your name is Jane Doe, your portfolio address is jdoe.htpwebdesign.ca than to navigate to your cPanel you would type in the following address into your browser: jdoe.htpwebdesign.ca/cpanel)</li>
                    <li>Once on your cPanel web page you will be asked to enter your cPanel username and password. Your cPanel username is the first part of your portfolio address and you will receive your password.
(e.g. - if your portfolio address is jdoe.htpwebdesign.ca then your cpanel username would be jdoe)</li>
                    <li>After you have entered your username and password press enter or return on your keyboard</li>
      				</div>   
                </div>
        </div>
    </section>
</main>
<?php 
include('templates/footer.inc');
?>