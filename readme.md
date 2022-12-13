# not-cms v0.1
Peeter Marvet / pets@tehnokratt.net / 2022-12-13  
*First version from 2018, udpated & completed in 2022 (on Mauritius)*

This is definitely not a CMS - I use it as quick explanation of how CMS and templating works
on web design and development course in Estonian Academy of Arts' Open Academy.

Steps are mostly my notes to allow fast progress without too much coding-on-screen (first
steps are easy to reproduce, but later it may be better to copy-paste segments). Most of
PHP functions in code are chosen to be 'human-readable'.

**Warning:** this is very un-secure on purpose (so I can explain risks of RCE, SQLi etc).
Only to be used on local demo env (path traversal, file creation/modification, RCE, SQLi)!

## Step 01

`index.html` vs `index.php` - demonstration how PHP can produce parts of HTML.

## Step 02

Including content from another file.

## Step 03

Including content by query parameter.

**Bonus track:** Admin at dirbustable location without authentication, Path traversal,
Local File Inclusion (LFI), depending on server conf Remote File Inclusion (RFI)
and Remote Code Execution (RCE).

## Step 04

Breaking out `header.php` and `footer.php` (to sync withWordPress theming basics),
demo of multiple 'templates' for different pages: `index.html`, `index-cat.html`.

## Step 05

Adding editing capability:

* `admin.php` - create one page
* `admin-pages.php` - create multiple pages (or files on system)
* `admin-edit.php` - edit/create multiple pages  (or files on system)
* `admin-wysiwyg.php` - same, with simple `contenteditable=true`
* `admin-tinymce.php` - same, now with TinyMCE editor

**Note:** TinyMCE needs API key from https://www.tiny.cloud/ (see [insert-api-key] in code)

**Bonus track:** Arbitrary File Creation, Arbitrary File Modification, Remote Code Execution (RCE)

## Step 06

Move content storage to database.

**Note:** TinyMCE needs API key from https://www.tiny.cloud/, DB credentials in file. SQL dump in folder

**Bonus track:** And now we have added SQL injection capability as well.  