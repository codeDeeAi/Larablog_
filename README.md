## About Larablog

Larablog is a simple blog application created with Laravel, it was my first project created in 2020 while learning PHP and Laravel.
However, this version is an upgraded version from Laravel 7 to 9 in 2022. It features:

- Simple yet powerful admin portal.
- Admin roles and permissions.
- Beautifuland interactive user interface and much more.

## Live Link

Would be available soon

## Development

- Clone repository
- Create ``.env`` file, add database credentials
- Create an account with Tinymce WYSIWYG Editor [click here](https://www.tiny.cloud/auth/signup/), add your API token
from Tinymce ``TINY_MCE_KEY="api-token..."`` to ``.env``
- Run ``composer install``
- Run ``php artisan migrate``

## Component Docs
- ### ALERT
    |  NAME | PROPS  | BLADE USE   | DESCRIPTION|
    |---|---|---|---|
    |  ``session-message`` | none  | ``<x-alert.session-message />`` | Displays session messages ``success``, ``warning``, ``error``, ``info``|

- ### BUTTONS
     |  NAME | PROPS  | BLADE USE   | DESCRIPTION|
    |---|---|---|---|
    |  ``table-actions`` | (1). ``traits`` - An array of value grouped by button name ``show``, ``edit``, ``delete`` (2). ``showEvent`` - Pass javascript method to view/show button (3.) ``editEvent`` - Pass javascript method to edit button (4.) ``deleteEvent`` - Pass javascript method to delete button | ``<x-buttons.table-actions :traits="['show' =>    ['disabled' => 'true', 'event' => 'onclick'],'edit' => ['event' => 'onclick'],'delete' => ['event' => 'onclick'],]" showEvent="jsMethod()" editEvent="jsMethod()" deleteEvent="jsMethod()" />`` | Displays CRUD buttons for table rows|
- ### ERRORS
    |  NAME | PROPS  | BLADE USE   | DESCRIPTION|
    |---|---|---|---|
    |  ``form-error`` | none  | ``<x-errors.form-error />`` | Displays form errors|
- ### FORMS
   - #### INPUTS
   - #### DELETE FORM
   


## Author

Bada Adeola [Github page](https://github.com/codeDeeAi), is a full-stack software developer whose interests lies in creating
efficient and scalable web based solutions.

## License

The Larablog is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
