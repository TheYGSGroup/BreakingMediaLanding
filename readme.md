# Breaking Media

**Production:** [breakingmedialicensing.com](https://breakingmedialicensing.com)  
<!-- **Development:** [dev.breakingmedialicensing.com](https://dev.breakingmedialicensing.com)   -->
**Location:** Host02 (/home/breakingmedia/public_html/)  
**Repo:** https://github.com/TheYGSGroup/BreakingMediaLanding  

This project includes a docker-compose.yml file to handle local development. Do not include this file when updating the version on the server.  

This project use gulp as the build tool. See gulpfile.js in the respective directory to see current tasks. Take note that subpages have their own gulp files. Also, if you are running this in windows be sure to use node from ***command prompt*** instead of **WSL**. Gulp doesn't appear to detect file changes for the watch statement if you are running the watch task from WSL in a mounted directory. 



