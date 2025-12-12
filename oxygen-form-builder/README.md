# Oxygen Form Builder

A custom component plugin for Oxygen Builder that adds form building elements.

## Installation

1. Download the plugin as a ZIP file.
2. In your WordPress admin panel, go to **Plugins > Add New**.
3. Click **Upload Plugin** and select the ZIP file you downloaded.
4. Activate the plugin.

## Usage

Once activated, you will find the new form components in the Oxygen Builder editor under the **"Form Elements"** category.

### Components

*   **Form Container:** A container for all your form fields. Set the `action` and `method` attributes here.
*   **Text Input:** A standard single-line text input field.
*   **Email Input:** A text input field specifically for email addresses.
*   **Textarea Input:** A multi-line text input field.
*   **Dropdown Input:** A dropdown select field. You can add options with labels and values in the component's controls.

## How to Build a Form

1.  Add a **Form Container** component to your page.
2.  Nest any of the input components inside the **Form Container**.
3.  Configure the input components with the desired `name`, `placeholder`, and other options.
4.  Set the **Action URL** in the **Form Container** to the URL where the form data should be submitted.
