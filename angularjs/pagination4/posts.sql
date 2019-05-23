CREATE TABLE `posts` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `posts` (`id`, `title`, `content`, `link`) VALUES
(1, 'Delete Multiple selected Records with jQuery AJAX in CodeIgniter', 'One by One record deletion from the list is time-consuming and frustrating when need to delete many records.\r\n\r\nWith the use of the checkboxes on the list, you can allow selecting multiple records. Only required to add a single delete button.', 'https://makitweb.com/delete-multiple-selected-records-with-jquery-ajax-in-codeigniter/'),
(2, 'How to upload and Extract Zip file in CodeIgniter', 'In CodeIgniter, there is zip library for creating a zip file but there is no library available for extracting the zip file.\r\n\r\nTo extract need to use ZipArchive Class.', 'https://makitweb.com/how-to-upload-and-extract-zip-file-in-codeigniter/'),
(3, 'Create and Download Zip file in CodeIgniter', 'In PHP, ZipArchive Class is used for creating a zip file.\r\n\r\nFor adding a whole directory files need to read directory files one by one and add in the ZipArchive Class object.', 'https://makitweb.com/create-and-download-zip-file-in-codeigniter/'),
(4, 'Export Data in Excel and CSV format with Laravel Excel', 'Laravel Excel is a package which simplifies the import and export data in Laravel.\r\n\r\nIt allows exporting data in various format - xlsx, csv, xml, html, pdf, etc.\r\n\r\nRequire to create a separate class from where return data and set heading row.', 'https://makitweb.com/export-data-in-excel-and-csv-format-with-laravel-excel/'),
(5, 'Auto populate Dropdown with jQuery AJAX in Laravel', 'Autopopulating values require when need to load records on child element based on parent element value.\r\n\r\nElement values replace with new items whenever parent element value changes.\r\n\r\nIn this tutorial, I show how you can auto-populate dropdown with jQuery AJAX in Laravel.', 'https://makitweb.com/auto-populate-dropdown-with-jquery-ajax-in-laravel/'),
(6, 'Remove Sorting from Specific Column - DataTables', 'DataTables makes pagination implementation easier.\r\n\r\nFor allowing searching it adds a search box and also adds up & down arrow on the column header for sorting.\r\n\r\nBy default, sorting has added on all columns.', 'https://makitweb.com/remove-sorting-from-specific-column-datatables/'),
(7, 'Import CSV Data to MySQL Database with Laravel', 'In CSV file you can store data in comma-separated string format.\r\n\r\nSometimes require to import existing CSV file data to MySQL database.\r\n\r\nFor this, you can either directly read the file or upload and then read the file for insert data.', 'https://makitweb.com/import-csv-data-to-mysql-database-with-laravel/'),
(8, 'Change Selected option in Select2 Dropdown with jQuery', 'Select2 is a jQuery plugin which customizes HTML select element and makes it more user-friendly.\r\n\r\nIt adds search features, allows to add an image with options.\r\n\r\nThe HTML select element option can easily set selected using jQuery - $(selector).val(option-value);.\r\n\r\nBut this not directly works with the Select2 dropdown element.', 'https://makitweb.com/change-selected-option-in-select2-dropdown-with-jquery/'),
(9, 'How to Upload a File in Laravel', 'File uploading is most used functionality in web applications.\r\n\r\nLots of application allows the users to manipulate files to the server like - profile image, upload documents, import data, etc.', 'https://makitweb.com/how-to-upload-a-file-in-laravel/'),
(10, 'Building a 5 Star Rating System in CodeIgniter', 'Nowadays mainly in every e-commerce websites, there is a rating option on the product page.\r\n\r\nThe user can rate the product based on its quality, usefulness, etc.\r\n\r\nThis rating is helpful for the other user who wants to purchase the product.\r\n\r\n', 'https://makitweb.com/building-a-5-star-rating-system-in-codeigniter/'),
(11, 'Load More Records on Button Click with Vue.js and PHP', 'The number of records displays on the page affect the load time of a webpage.\r\n\r\nTo improve response time you can show limited records at a time using pagination.\r\n\r\nThere are various types of pagination available.\r\n\r\n', 'https://makitweb.com/load-more-records-on-button-click-with-vue-js-and-php/'),
(12, 'Make Autocomplete search with XML Data - jQuery AJAX', 'Autocomplete search make easier to find an item from the long list of available items.\r\n\r\nIt displays suggestion based on the typed searched text.\r\n\r\nIf your data available in XML format then also you can use it for autocomplete searching.', 'https://makitweb.com/make-autocomplete-search-with-xml-data-jquery-ajax/'),
(13, 'How to Send AJAX request from Plugin in WordPress', 'Plugin is used to add features to the site without modifying the core code.\r\n\r\nWhile building plugin you can also use AJAX to save the form after submit, retrieve data from MySQL database, file upload, etc.\r\n\r\nIn the plugin, AJAX is implemented as same as implemented on the theme.', 'https://makitweb.com/how-to-send-ajax-request-from-plugin-wordpress/'),
(14, 'Call Model method from another Model in CodeIgniter', 'In CodeIgniter, Model is used for the Database manipulation - fetch, insert, update, and delete records.\r\n\r\nIf within the project there are multiple Models are available then it may require to perform the action in a Model which is already created in another Model.\r\n\r\nIn this case, you can either create a separate function to perform the same action or use the already available method in the Model.', 'https://makitweb.com/call-model-method-from-another-model-in-codeigniter/'),
(15, 'How to add Custom Filter in DataTable - AJAX and PHP', 'When DataTable is initialized on the HTML table then it generates pagination which has sorting, searching on all columns, change number of records display features.\r\n\r\nThe default search control mainly uses to finds value on all columns and display filter list. But it can be customized.', 'https://makitweb.com/how-to-add-custom-filter-in-datatable-ajax-and-php/'),
(16, 'DataTables AJAX Pagination with Search and Sort - PHP', 'DataTables is a jQuery plugin which makes easier to add pagination on the webpage.\r\n\r\nJust need to add records list then it will auto-adjust data and create pagination with search and sort feature.\r\n\r\nThere are options available to implement AJAX pagination.', 'https://makitweb.com/datatables-ajax-pagination-with-search-and-sort-php/'),
(17, 'Update Multiple Selected Records with PHP', 'Sometimes its require to quickly modify multiple records and save it to the MySQL database table.\r\n\r\nIt makes easier to update records instead of updating one by one.\r\n\r\nWith checkboxes, enable multiple records selection from the list.', 'https://makitweb.com/update-multiple-selected-records-with-php/'),
(18, 'Sort Pagination records on Header Click in CodeIgniter', 'Pagination is used to display the large list of records in multiple pages form. This makes easier to access records.\r\n\r\nYou can make traversing more easier by add sorting on the table.\r\n\r\nThe table list gets arranged according to the clicked header.', 'https://makitweb.com/sort-pagination-records-on-header-click-in-codeigniter/'),
(19, 'How to Create Custom Page Template in WordPress', 'In WordPress, you can easily customize the page by editing the page.php file of the active theme. But the change will affect on all pages where no need of customization.\r\n\r\nYou can avoid this by creating the custom page template.\r\n\r\nUsing this you can design different-different layout for the pages and add extra content to it without affecting regular pages on the site.\r\n\r\n', 'https://makitweb.com/how-to-create-custom-page-template-in-wordpress/'),
(20, 'How to Display existing files on Server in Dropzone - PHP', 'Dropzone library makes easier to implement file upload using drag and drop on the page.\r\n\r\nAfter file uploading, it shows the preview of the file in the upload area.\r\n\r\nAll the thumbnails are removed when the webpage is get refreshed.\r\n\r\nTo recreate the thumbnails after page refresh needs to send AJAX request to get all files list for adding thumbnails while initializing Dropzone.', 'https://makitweb.com/how-to-display-existing-files-on-server-in-dropzone-php/'),
(21, 'Insert Update and Delete record with AJAX in Laravel', 'AJAX is use to communicate with the server and perform action like - database manipulation, file upload, etc. without the need to refresh whole page.\r\n\r\nIn this tutorial, I show how you can use jQuery AJAX to insert, update, and delete records in Laravel.', 'https://makitweb.com/insert-update-and-delete-record-with-ajax-in-laravel/'),
(22, 'Dynamic Dependent Dropdown with Vue.js and PHP', 'Auto-populating records based on the selection make easier to control the flow of inputs and the user is restricted on the selection.\r\n\r\nData is updated on dependent dropdown according to parent dropdown selection.\r\n\r\nTo send AJAX request in Vue.js I am using Axios package.', 'https://makitweb.com/dynamic-dependent-dropdown-with-vue-js-and-php/'),
(23, 'Fetch records from MySQL with jQuery AJAX - Laravel', 'AJAX makes easier to load records from MySQL database without reloading the whole page.\r\n\r\nHandle AJAX request from the controller and database manipulation in the model.\r\n\r\nIn this tutorial, I show how you can fetch records from MySQL database with jQuery AJAX in Laravel.', 'https://makitweb.com/fetch-records-from-mysql-with-jquery-ajax-laravel/'),
(24, 'Drag and Drop file upload with Dropzone in CodeIgniter', 'Dropzone is a JavaScript library which allows uploading file by drag’n’drop and display the file preview after upload.\r\n\r\nIt is easier to add to the page and it does not depend on any library like jQuery.\r\n\r\nThe file will upload to the server via AJAX.\r\n\r\n', 'https://makitweb.com/drag-and-drop-file-upload-with-dropzone-in-codeigniter/'),
(25, 'How to Reorder Images and Save to MySQL with jQuery AJAX', 'jQuery UI sortable enable to reorder the HTML element by drag & drop.\r\n\r\nThis will use to allow the users to adjust the positions of images to display on the webpage.\r\n\r\nIn this tutorial, I show how you can save the sorted image list order in the MySQL database and read it.', 'https://makitweb.com/how-to-reorder-images-and-save-to-mysql-with-jquery-ajax/'),
(26, 'Retain AJAX pagination position after Refresh in CodeIgniter', 'AJAX pagination makes it easier to display the large list of records in multiple pages without refreshing the whole page when navigating.\r\n\r\nWhile navigating pages if you refreshed the webpage then it will load record from 1st instead of page position before the refresh.\r\n\r\nE.g. If you are on 5 page then it will again start from 1 when webpage reload.\r\n\r\n', 'https://makitweb.com/retain-ajax-pagination-position-after-refresh-in-codeigniter/'),
(27, 'Live Remaining and Character counter with Vue.js', 'The live character counter is very useful when need to validate the user from entering more input or display warning message.\r\n\r\nCharacter count visible on the screen while inputting character in the input box.\r\n\r\nThis notifies the user that how many characters are left or the total number of characters is been entered.\r\n\r\n', 'https://makitweb.com/live-remaining-and-character-counter-with-vue-js/'),
(28, 'Upload and Store video to MySQL Database with PHP', 'By storing media files to MySQL database make easier to retrieve files uploaded by the user or in the specific category.\r\n\r\nFor this require storing file to the server and save the reference to the database.\r\n\r\nIn the tutorial, I show how you can upload and store video to MySQL database table with PHP.', 'https://makitweb.com/upload-and-store-video-to-mysql-database-with-php/'),
(29, 'Insert Update and Delete record from MySQL in Laravel', 'If you are using MySQL database in your web project then there is always possibility that you need to insert, update, and delete records instead of just fetching and displaying records.\r\n\r\n\r\n \r\nIn this tutorial, I show how you can insert, update, and delete a record from MySQL database table in Laravel.', 'https://makitweb.com/insert-update-and-delete-record-from-mysql-in-laravel/');