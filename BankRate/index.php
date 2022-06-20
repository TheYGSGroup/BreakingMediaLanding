<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Bankrate</title>
    <meta name="author" content="">
    <meta name="description" content="The official licensing partner of Bankrate">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="CSS/normalize.css" rel="stylesheet">
    <link href="CSS/main.min.css?ver=1.0.1" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <style>
        #licensing {
            display: flex;
            flex-direction: column;
            flex-wrap: wrap;
        }

        #licensing [class*="col-"] {
            flex: 0 0 100%;
            flex-basis: 100%;
        }

        #licensing .col-two {
            text-align: center;
        }

        #licensing .col-two img {
            max-width: 100%;
            width: auto;
            height: auto;
            float: none;
            display: inline-block;
            line-height: 0;
        }

        @media screen and (min-width: 768px) {
            #licensing {
                flex-direction: row;
            }

            #licensing [class*="col-"] {
                flex: 0 0 50%;
                flex-basis: 50%;
                box-sizing: border-box;
            }

            #licensing .col-one {
                padding-right: 5vw;
            }

            #licensing .col-two img {
                max-width: 76%;
                padding-top: 8vh;
            }
        }

        @media screen and (min-width: 960px) {
            #licensing .col-two {
                text-align: left;
            }
        }
    </style>
</head>

<body>
    <header>
        <img src="Images/logo-compilation.png" class="logos" /> The official licensing partner of Bankrate <a
            href="#LicenseNow">License Now</a>
    </header>
    <div id="content">
        <div id="hero-section">
            <span class="contactInfo">(800) 290-5460&nbsp;&nbsp;&nbsp;&nbsp;<a href="mailto:Bankrate@theYGSgroup.com"
                    target="_blank" class="whiteLink">Bankrate@theYGSgroup.com</a></span>
            <h1>Your product received<br>valuable recognition</h1>
            <span class="subTitle">Mazimize your marketing by letting<br>your target audience know!</span>
        </div>
        <div id="licensing">
            <div class="col-one">
                <h2>The official licensing partner of Bankrate</h2>
                <a class="button license-button" href="#LicenseNow">License Now</a>
                <p>Featuring a review, quote, or third-party endorsement badge in your marketing gives your audience an
                    unbiased, trusted recommendation they can rely on when making purchasing decisions. Bankrate is
                    highly recognizable and valued by consumers, setting your product apart in a crowded landscape.</p>
                <h3>Badge and Quote Licensing</h3>
                <p>Use on your website, social media, product packaging, in-store retail display, print marketing,
                    advertising collateral, and TV.</p>
                <h3>Reprints/Eprints</h3>
                <p>Use in print marketing collateral, on your website in PDF format, or in emails to showcase positive
                    press.</p>
                <h3>Specialty Graphics Award Products</h3>
                <p>Promote your feature with banners, posters, wall clings, desktop lobby awards and
                    more.</p>
            </div>
            <div class="col-two">
                <img src="Images/bankgroup.png" class="stats" />
            </div>

        </div>
        <div id="LicenseNow" name="LicenseNow">
            <div id="license-form">
                <h2>License now</h2>
                <h3>Ready to license? Have some more questions?</h3>
                <p>Allow one of our content sales and licensing account executives to assist you! Complete the form
                    below, and we will be in touch in 1-2 business days.</p>
                <form class="contact-form" action="submit.php" method="POST">
                    <!-- <form class="contact-form" action="https://webto.salesforce.com/servlet/servlet.WebToLead?encoding=UTF-8" method="POST"> -->
                    <input type=hidden name="oid" value="a070c000012bIYR"> <!-- Organization ID, will not change -->
                    <input type=hidden name="retURL" value="https://www.rvlicensing.com/BankRate/index.php?ty=true">

                    <!--  ----------------------------------------------------------------------  -->
                    <!--  NOTE: These fields are optional debugging elements. Please uncomment    -->
                    <!--  these lines if you wish to test in debug mode.                          -->
                    <!-- <input type="hidden" name="debug" value="1">                         -->
                    <!-- <input type="hidden" name="debugEmail" value="Bankrate@theYGSgroup.com">   -->
                    <!--  ----------------------------------------------------------------------  -->

                    <label for="FirstName" style="margin-top: 40px;">First name <sup>*</sup></label>
                    <input type="text" id="FirstName" name="FirstName" placeholder="ex. John" />
                    <label for="LastName">Last name <sup>*</sup></label>
                    <input type="text" id="LastName" name="LastName" placeholder="ex. Doe">
                    <label for="Company">Company <sup>*</sup></label>
                    <input type="text" id="Company" name="Company" placeholder="ex. ABC Company">
                    <label for="Phone">Phone <sup>*</sup></label>
                    <input type="text" id="Phone" name="Phone" placeholder="ex. (555) 123-4567">
                    <label for="Email">Email <sup>*</sup></label>
                    <input type="text" id="Email" name="Email" placeholder="ex. john.doe@gmail.com">
                    <label for="ArticleName">Article name</label>
                    <input type="text" id="ArticleName" name="ArticleName" placeholder="ex. The best site to...">
                    <label for="ArticleURL">Article URL (if online)</label>
                    <input type="text" id="ArticleURL" name="ArticleURL" placeholder="ex. https://myarticleurl.com">
                    <label for="ArticleDate">Article Publication Date</label>
                    <input type="text" id="ArticleDate" name="ArticleDate" placeholder="ex. 01/20/2022">
                    <label for="HowWouldYouUse">How would you like to use this content? <sup>*</sup></label>
                    <textarea id="HowWouldYouUse" name="HowWouldYouUse"
                        placeholder="ex. Advertising campaign"></textarea>
                    <button type="submit" class="button">Submit</button>
                </form>
                <?php if (isset($_GET["ty"]) && $_GET["ty"]): ?>
                <p>Thank you for your interest in licensing content from Bankrate. One of our account executives will be
                    in touch within the next 24 hours to discuss the details with you.</p>
                <?php endif; ?>
            </div>
            <div id="guidelines">
                <h2>Guidelines</h2>
                <h3>Usage creative guidelines</h3>
                <ol>
                    <li><b>Usage Request</b>
                        <ul>
                            <li>All requests for award badges and usage agreements must be made by email to Anastasia Stover at Bankrate@theYGSgroup.com.</li>
                        </ul>
                    </li>
                    <li><b>Creative Guidelines</b>
                        <ul>
                            <li>Recommended size is 100% of supplied badge size.</li>
                            <li>On a white or light background, badge should be printed in color and kept in existing
                                format.</li>
                            <li>All quotes must be attributed to publication name with the date of the review.</li>
                        </ul>
                    </li>
                    <li><b>Disclaimer</b>
                        <ul>
                            <li>The following disclaimer needs to be included with all submitted creative using the
                                badge: “(Publication name) is not affiliated with and does not endorse products or
                                services of (Name of Licensee) For example, Bankrate Awards is a registered trademark of
                                Bankrate and is used under license.”</li>
                        </ul>
                    </li>
                </ol>
                <br>
                <h3>Usage opportunities</h3>
               <p> Using a Bankrate award badge or quote on your advertising and product packaging are two
                 high-impact ways for your company to promote the award among consumers and to help drive sales.</p>
                    
                <p>Use these great opportunities to show off your Bankrate award badge or quote:</p>
                <ul>
                    <li>Product advertisements and commercials</li>
                    <li>Website (a link to the publication’s website must appear wherever badge is displayed)</li>
                    <li>Social media (organic and paid)</li>
                    <li>Product or product packaging</li>
                    <li>Retail displays, including counter displays, shelf-talkers, point-of-purchase displays,
                        posters/wall hangings</li>
                    <li>Email and newsletters</li>
                    <li>Intranet and internal correspondence</li>

                </ul>
                <h3>Frequently asked questions</h3>
                <ol>
                    <li><b>What is the benefit of licensing Bankrate badges and content?</b>
                        <p>Bankrate has been helping people make smarter financial decisions for nearly half a century. From our product comparison tools to award-winning editorial content, we provided object information and actionable next step to help you make information descisions. It why over 100 million people put their trust in us every year.</p>
                    </li>
                    <li><b>What is the turnaround time on licensing approval?</b>
                        <p>Turnaround time is 24 hours after receipt of payment and submission of creative for approval.
                            All creative material must be approved before it is distributed.</p>
                    </li>
                    <li><b>What do I do when the license expires?</b>
                        <p>If you wish to continue using the quote or badge license after it has expired, you may reach
                            out to YGS directly at: Bankrate@theYGSgroup.com and we can provide you with a renewal
                            quote. Should you decide to not renew for another term, please remove the creative from your
                            website, email signature, collateral, etc… and cease use of the previously licensed content.
                        </p>
                    </li>
                </ol>
            </div>
        </div>
    </div>
    <footer>
        <div id="col1">
            <h4>The YGS Group</h4>
            <p>Official Licensing Partner of Bankrate<br>
                (800) 290-5460<br>
                <a href="mailto:Bankrate@theYGSgroup.com" target="_blank" class="whiteLink">Bankrate@theYGSgroup.com</a>
            </p>
        </div>
    </footer>
</body>

</html>