Bonfire-HybridAuth_login
======================

Recognition
===========
This is module is based on HybridAuth: http://hybridauth.sourceforge.net/
The module was started by extending the work done here: https://github.com/andacata/HybridIgniter

About
======================
This module is intended to be used by anyone that wants to add new login methods for their users including:
Facebook,
Twitter,
Google,
LinkedIn
Yahoo,
AOL,
Live(Microsoft),
Foursquare,
OpenID



There is a managment tool added to the users to allow you to turn on and off HybridAuth as well as add in your ID's and Key's. In the auth lib within the method `get_hauth_user()` there is a note about an if statement to remove. If this `if` statement is removed then the user can login to their account with which ever provider they choose so long as it is the same email address. If it is kept in then the user can only register with their first initial provider and all the other providers they attempt to login in with will be revoked.

This version uses HybridAuth 2.1.2 and has beed tested on Bonfire 0.7+

Note
====
When a user initially logins with there app it does take some time for them to login (Thinkning about adding a JS loading spinner), however, this is all happening in the auth lib so can't be helped but after the initial login we are back to rapid normal Bonfire.

Installation
======================
1. Move the folder 'users' to the folder 'application/modules/' in your bonfire install
2. Next go to your migrations (Developer -> Database tools -> Migration) and install the latest DB migration for the module users.
3. You are installed! Go to your admin panel and select "Settings"->"users"->"HybridAuth Managment" and get yourself started


Obtaining additional user information
============
In the Database you can add extra scope to a provider, however, I have not added the option to the management tool as didn't think in necessary (except Facebook as we need one to obtian the users email).

TESTING
======================
I Have only tried this with Facebook and it works fine and will in the next few day's test with Google and Twitter and then after that will slowly get through the rest.
