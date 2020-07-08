# Better Maintenance For Magento 2

[Better Maintenance for Magento 2](https://www.mageplaza.com/magento-2-better-maintenance/) helps you notify customers that your site is currently under maintenance or upgradation, and prepare for upcoming products/ services. Thanks to Better Maintenance module, store visitors are well informed about maintenance progress as well as the launch date with comfort.


## 1. Documentation
- [Installation guide](https://www.mageplaza.com/install-magento-2-extension/)
- [User guide](https://docs.mageplaza.com/better-maintenance/index.html)
- [Introduction page](http://www.mageplaza.com/magento-2-better-maintenance/)
- [Contribute on Github](https://github.com/mageplaza/magento-2-better-maintenance)
- [Get Support](https://github.com/mageplaza/magento-2-better-maintenance/issues)


## 2. FAQ

**Q: I got an error: Mageplaza_Core has been already defined**

A: Read solution [here](https://github.com/mageplaza/module-core/issues/3)

**Q: How many types of waiting pages are provided in Better Maintenance?**

A: There are two types of waiting pages available in the extension: Maintenance Page and Coming Soon Page.

**Q: What styles of countdown timer styles are provided in Better Maintenance?** 

A: Better Maintenance module offers five styles of clocks, including Simple, Circle, Square, Stack, and Modern.

**Q: I want to upload images or videos to make the page background. Is this possible?**

A: Yes, definitely. You can upload one image, multiple images, and video as the background of Maintenance/ Coming Soon Page. 

**Q: Can I insert metadata to Coming Soon Page to benefit SEO?**

A: Yes, from the backend configuration of Coming Soon Page, you can easily insert Meta Title, Meta Description, and Meta Keyword.

**Q: How can I divide the page into two columns?**

A: You can easily do it by accessing the Layout section and select style: Double-column or Double-column with Left-side content.

## 3. How to install Better Maintenance extension for Magento 2

Install via composer (recommend): Run the following command in Magento 2 root folder:

```
composer require mageplaza/module-better-maintenance
php bin/magento setup:upgrade
php bin/magento setup:static-content:deploy
```

## 4. Highlight Features 


### Redirect Users to Coming Soon and Maintenance page

![Imgur](https://i.imgur.com/LSzhMZg.gif)

When the store site is off for an update, the prioritized task of the store owner is to make customers calm down to wait for site launching. Redirecting visitors to communicative Coming Soon or Maintenance Page is the ideal choice.

Coming Soon Page is an excellent place for informing about upcoming products, services, deals, or any promotional campaigns. Meanwhile, Maintenance Page is supportive appropriately in case a store page is under construction or upgrade.

According to each specific situation, an e-commerce website should use two user-friendly pages appropriately.


### Support ready-to-use countdown timer during maintenance 

![Imgur](https://i.imgur.com/vaREXjV.png)

Better Maintenance extension comes with a countdown timer which lets customers know the exact launch date. 
According to the end time, the running clock will show how much time remaining before the website goes live. This timing indicator makes customers feel clear and willing to come back as the schedule.

There are five available clock styles with eye-catching designs named Simple, Circle, Square, Stack, and Modern. Store admins can easily select one and apply instantly to Maintenance Page or Coming Soon Page. Also, admins can freely customize these clock styles by changing the clock background color, clock number color to make it suitable with store themes if necessary.

### Contact customers via subscription or social channels

![Imgur](https://i.imgur.com/SxNVzGF.png)

Another striking feature of Better Maintenance extension is the call to action function - Subscription section or Social Share button.
There is a subscription section shown on Maintenance/ Coming Soon Page to collect customer information. Visitors who are early fans of your store will not hesitate to provide their emails to be gotten in touch later. Interestingly, the subscription form is customizable so admins can change the form content and color to encourage customers as they want.
Besides, if visitors have any questions and want to contact the store urgently, they can click to the Social Share button which redirects them to other social channels of the store such as Facebook, Twitter, Instagram, Google+, Youtube, Pinterest.


### Freely customize every page elements

![Imgur](https://i.imgur.com/DaR9EHf.png)

Store admins are allowed to customize all components of the Coming Soon page and Maintenance page with ease.

From three types of layout, including a single column, double columns, and double columns with left-side content, admins can easily pick the suitable one. Besides, it is convenient to customize the page title, page description, and text color. To make the page more attractive, the page background can be chosen from an uploaded image or video.

Another distinctive element of the Maintenance Page is the Progress bar, which helps customers keep update with the maintenance process of your website store.

### Easily make an exception with whitelist 

![Imgur](https://i.imgur.com/C35ZFnd.png)

In reality, there are some specific cases when the store owners want to disable page redirection. It is the reason why Better Maintenance extension offers Whitelist function. Particularly, admins or special customers with the whitelist IPs added at the backend are allowed to access to store site without being navigated. 

Besides, store admins can make the page exception with ease. From the backend, the pages links can be added to Whitelist pages links that are accessible to customers during maintenance.


### Quick preview

![Imgur](https://i.imgur.com/b0aG3HK.png)

After finishing every setting process, admins can quickly view what the storefront looks like by clicking on the Preview button.

Thanks to this useful feature, it is very convenient and time-saving for store admins to test with different changes in page appearance (text color, background color, etc.).

## 5. More Features

### Footer Link 
The links which are accessible to customers can be attached at the page footer 

### Page Background 
There are three available styles of page background including Single Image, Multi-image, and Video

### Progress Bar
With Progress Bar, customers can keep updated with the maintenance process of the website store

### Meta Data for SEO
It is able for store admins to add meta title, meta description, meta keywords in the Coming Soon Page to benefit SEO

### End Date Time 
Allow admins to set the ending time of the Maintenance/ Coming Page. The countdown timer run accordingly

### Auto switch to Live site mode
When the ending time reaches, customers will be switched automatically to the live site

### Display real-time of store
Show the current time basing on the Timezone of the store site

### HTTP Response Header
Store admins can inform the page status of the Maintenance Page to Google (503 - Service Unavailable, 200 - OK)

### Support Multi Stores
Better Maintenance module support multiple store views

### Responsive 
Mageplaza Better Maintenance extension is well responsive on the screen of any devices - PC, smartphone or tablet.

### Page route 
Store admins can set the page route which appears on page URL

### Extension Compatibility
Properly compatible with Mageplaza Google Tag Manager


## 6. Full Features List 


### For store admins
#### General Configuration 

- Allow/ Disallow the extension 
- Show the real-time according to the Timezone of the store site
- Set ending time of Maintenance/ Coming Page. The countdown timer will run accordingly. 
- Choose Page to redirect visitors during maintenance/waiting time (any CMS page, Mageplaza customizable Maintenance Page or Coming Soon Page)
- Allow/ Disallow auto-switching customers to the live site when the ending time reaches.
- Make access exception with Whitelist IPs and Whitelist Page Links

#### Clock Setting 
- Allow/ Disallow to show a countdown timer
- Pick clock style: Simple, Circle, Square, Stack, Modern
- Customize Clock Background Color, Clock Inner Background Color, Clock Number Color 

#### Subscribe Setting 
- Choose Subscription Type: None, Newsletter Subscription, Account Registration 
- Set subscription description, Description Text Color, 
- Set Button Label, Button Text Color, Button Background Color

#### Footer Setting 
- Choose CMS Block to be the page footer. Customers can access during waiting. 

#### Social Contact 
- Allow showing Social Contact on page
- Set label, label color of Social Contact button 
- Add social links: Facebook, Twitter, Instagram, Google+, Youtube, Pinterest

#### Maintenance Page setting 

- Set page route which is displayed on page URL
- Choose page layout: Single-column, Double-column, Double-column with Left-side content
- Set title for the page 
- Set page description, text color
- Upload logo on the page 
- Pick background type: Single Image, Video, Multi-Image
- Allow/ Disallow Progress Bar, set progress value, label, label color, bar color 
- Preview Maintenance page

#### Coming Soon Page setting 
- Set page route which is shown on page URL
- Choose page layout: Single-column, Double-column, Double-column with Left-side content
- Set title for the page 
- Set page description, text color
- Upload logo on the page 
- Choose background type: Single Image, Video, Multi-Image
- Add Meta Title, Meta Description, Meta Keyword
- Preview Coming Soon page



### For customers 
- Make customer comfortable to wait for technical fixing
- Be able to keep updated with the maintenance progress 
- Well informed about the launch date
- Get in touch with the store via social channels 
- Chances to receive benefits when providing emails 

## 7. User Guide 

### How to Use

#### Display Maintenance Page during maintenance time

![](https://i.imgur.com/I44SSJL.png)

#### Show Coming Soon Page for New Products or Services

![](https://i.imgur.com/v5oIKHi.png)


### How to Configure

From the Admin Panel, go to `Stores > Settings > Configuration`, at the **Mageplaza Extension** tab select **Better Maintenance**

![Imgur](https://i.imgur.com/psjaf4M.png)

#### 1. General Configuration

![Imgur](https://i.imgur.com/N4cZWlv.png)

- **Enable**: Select **Yes** to use the module's feature
- **Real Time of Website**:
  - Displays the current time according to the **Timezone** of the Website
  - Admin can check Timezone at **Configuration**, **Locale Options** in **General Options** of General tab
- **End Date Time**:
  - Select the end date of Maintenance mode
  - Countdown Timer will rely on End Date to count down
  - Time is calculated from the **Save Configuration** time to the **End Date**
- **Redirect To Page**
  - Select page to redirect customers to during maintenance/ waiting time
  - Admin can choose any **CMS Page** or design by yourself follow **Mageplaza's Maintenance Page or Coming Soon Page** templates
  - When it comes to **End Date** Time, any store's link will be redirected to the selected page (except **Whitelist IPs** and **Whitelist Page Links**).
- **Auto Switch to Live Site Mode**:
  - Select **Yes** to automatically switch to **Live Site Mode** when it comes to **End Date Time**
  - If **No**, **Maintenance** is always applied until the admin turn off the module or switches the **Auto Switch** to **Yes**
- **Whitelist IP(s)**:
  - Only IP addresses filled in this section can access the page without being redirected to **Maintenance Page**
  - It is possible to allow 1 IP address, multiple IP addresses, 1 range of IP addresses or multiple IP address ranges, IP addresses are separated by commas.
  - Store owners can also allow IP addresses as follows:
    - `10.0.0.10`, `10.0.0.*`, `10.0.*.*`, `10.0.0.* - 123.0.0.*`, `12.3.*.* - 222.0.*.*`
    - Symbol "*" in range 0 - 255
- **Whitelist Page link(s)**:
  - With the pages filled in this section, customers still can access them without being redirected to Maintenance Page. 
  - The pages are separated by a line. Each page link is on one line


#### 2. Display Setting

The settings here will apply to both Better Maintenance Page and Coming Soon Page

##### 2.1. Clock Setting

- **Enable Clock**: Select **Yes** to display **Countdown Timer** in Frontend
- **Countdown Clock Style**:
  - We offer 5 types of Clock Style: **Simple, Circle, Square, Stack, Modern**
  - Admin needs to select 1 of 5 types to display at Frontend
- **Clock Background Color**:
  - The setting allows changing the background color of the clock
  - Not displayed with **Style = Simple**
  - After loading the template, if you don't like the background color, admin can choose the background color for the clock you want
- **Clock Inner Background Color**:
  - Allows changing the 2nd background color (internal color) of the clock
  - Only displayed with **Style = Stack**
- **Clock Number Color**:
  - You can choose the color of the numbers in the clock
  - After loading the template, if you don't like the color of the numbers, admin can choose the color of the number for the clock you want.

##### 2.2. Subscribe Setting

![Imgur](https://i.imgur.com/079YvqD.png)

- **Subscription Type**: 3 options can be selected:
  - **None**: Subscription form will not be displayed in Frontend
  - **Newsletter Subscription**: Subscribe form only includes **Email** field and **Subscribe** button. Admin can check the customer who subscribed by going to `Marketing > Communications > Newsletter Subscribers`
  - **Account Registration**: Display the form to register an account with the checkbox subscribe. Customers need to create an account to receive email newsletter
- **Subscription Description**:
  - Enter description of the Subscribe form.
  - If left blank, there is no description
- **Description Text Color**:
  - Change the text color of Description
  - If left blank, description will not be displayed in Frontend
- **Label Button**:
  - Set Label for **Submit form** button. Admin can customize in different languages
  - If left blank, **Default = Subscribe**
- **Button Text Color**:
  - Change the text color of Label
  - If left blank, **default = #FFFFFF**
- **Button Background Color**:
  - Change the background color of the button
  - If left blank, there is no default


##### 2.3. Footer Block

![Imgur](https://i.imgur.com/VVkhzxj.png)

- Select CMS Block to be the Footer at Frontend.
- The selected CMS Block is the footer of **Maintenance/ Coming Soon Page**. Therefore, it is recommended to select CMS Block Link on the **Whitelist Page Link(s)** list for customers to access.

##### 2.4. Social Contact

![Imgur](https://i.imgur.com/bHCgbCJ.png)

- **Enable**: Select **Yes** to display social contacts at Frontend
- **Label**: Set Label for **Social Contact** field
- **Label Color**: Change the text color of Label
- **Social Page Link**:
  - Admin can fill the links of the social page according to the corresponding fields
  - We offer 6 basic social pages: **Facebook, Twitter, Instagram, Google+, Youtube, Pinterest**
  - Each field is filled with links, their icons will be displayed in Frontend


#### 3. Maintenance Page Setting

![Imgur](https://i.imgur.com/fr8j1W7.png)

- **Page Route**:
  - Enter the route name which appears on the URL. 
  - If you leave it blank, the default Route name is `mpmaintenance`. 
  - Example Route name is `https://domain.com/mpmaintenance`. You can change it to anything you want

- **Select Layout**: we provide 3 types of layout for the page
  - **Single-column**
  - **Double-column**
  - **Double-column with Left-side content**

- **Page Title**:
  - Set the Title of the Page
  - If left blank, **default = Under Maintenance**

- **Page Description**:
  - Enter Page Description 
  - If left blank, default = `We're currently down for maintenance. Be right back!`

- **Text Color**: Change the text color of **Page Title** and **Description**

- **Logo**:
  - Admin can upload the store **Logo** to **Maintenance Page**
  - Logo supports image files

- **Background Type**: 3 types of Background admin can be selected as follows:
  - **Image**: Background is a fixed image uploaded by admin
  - **Video**: Background is a fixed video uploaded by admin
  - **Multi-image**: Background is displayed as a photo slide uploaded by admin.

- **Upload File**:
  - Depending on the background type, the type file is changed.
  - Only upload **image files** if background type is **Image/ Multi Image**
  - Only upload **mp4 files** if background type is **Video**

- **Show Progress Bar**:

  - Select **Yes** to display the Progress Bar in **Maintenance Page**
  - This will help customer estimate the maintenance progress of the page

  - **Progress Value**: Enter the maintenance percentage that the page has made.
  - **Label**: Enter the label for **Progress bar**
  - **Label Color**: Change the font color for Label
  - **Progress Bar Color**: Change the background color of Progress bar
  
- **HTTP Response Header**: Send the status of the page to Google
  - **503 Service Unavailable**
  
  ![Imgur](https://i.imgur.com/LiqboYP.png)

  - **200 OK**
  
  ![Imgur](https://i.imgur.com/Ickb1Fm.png)

- **Preview button**: Admin can click **Preview** to quickly see the edited page. The **Preview** page has the same content as Frontend. If uploading files, need to save the configuration before previewing

#### 4. Coming Soon Page Setting

![Imgur](https://i.imgur.com/1ufp4m1.png)

- **Page Route**:
  - Enter the route name which appears on the URL. 
  - If you leave it blank, the default Route name is `mpcomingsoon`. 
  - Example: Page route is https://domain.com/mpcomingsoon. You can change it to anything you want
  
  - **Select Layout**: we provide 3 types of layout for the page
  - **Single-column**
  - **Double-column**
  - **Double-column with Left-side content**

- **Page Title**:
  - Set the Title of the Page
  - If left blank, **default = Coming Soon**
  
- **Page Description**:
  - Enter Page Description 
  - If left blank, default = `Our new site is coming soon. Stay tuned!`

- **Text Color**: Change the text color of **Page Title** and **Description**

- **Logo**:
  - Admin can upload the store **Logo** to **Coming Soon Page**
  - Logo supports image files

- **Background Type**: 3 types of Background admin can be selected as follows:
  - **Image**: Background is a fixed image uploaded by admin
  - **Video**: Background is a fixed video uploaded by admin
  - **Multi-image**: Background is displayed as a photo slide uploaded by admin.

- **Upload File**:
  - Depending on the background type, the type file is changed.
  - Only upload **image files** if background type is **Image/ Multi Image**
  - Only upload **mp4 files** if background type is **Video**

- **Meta Title**: Enter the Meta Title for Coming Soon Page. This helps improve your SEO
- **Meta Description**: Enter Meta Description for Coming Soon Page. This will support better SEO
- **Meta Keywords**: Enter Meta Keyword for Coming Soon Page. This will support better SEO
- **Preview button**: Admin can click **Preview** to quickly see the edited page. The **Preview** page has the same content as Frontend. If the admin uploads files, need to save the configuration before previewing.


