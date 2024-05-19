# Your Project Name

## Group ltw16g02

- Afonso Domingues (up202207313) 60%
- João Lamas (up202208948) 20%
- Pedro Fernandes (up202207987) 20%

## Install Instructions

    git clone git@github.com:FEUP-LTW-2024/ltw-project-2024-ltw16g02.git
    git checkout final-delivery-v1
    sqlite database/project.db < database/script.sql
    php -S localhost:9000


## Screenshots

![Items Page](images/itemspage.png)
![Profile Page](images/profile.png)
![Main Page](images/mainpage.png)

## Implemented Features

**General**:

- [ ] Register a new account.
- [ ] Log in and out.
- [ ] Edit their profile, including their name, username, password, and email.

**Sellers**  should be able to:

- [ ] List new items, providing details such as category, brand, model, size, and condition, along with images.
- [ ] Track and manage their listed items.
- [ ] Respond to inquiries from buyers regarding their items and add further information if needed.
- [ ] Print shipping forms for items that have been sold.

**Buyers**  should be able to:

- [ ] Browse items using filters like category, price, and condition.
- [ ] Engage with sellers to ask questions or negotiate prices.
- [ ] Add items to a wishlist or shopping cart.
- [ ] Proceed to checkout with their shopping cart (simulate payment process).

**Admins**  should be able to:

- [ ] Elevate a user to admin status.
- [ ] Introduce new item categories, sizes, conditions, and other pertinent entities.
- [ ] Oversee and ensure the smooth operation of the entire system.

**Security**:
We have been careful with the following security aspects:

- [ ] **SQL injection**
- [ ] **Cross-Site Scripting (XSS)**
- [ ] **Cross-Site Request Forgery (CSRF)**

**Password Storage Mechanism**: hash_password&verify_password

**Aditional Requirements**:

We also implemented the following additional requirements:

- [ ] **User Preferences**
- [ ] **Real-Time Messaging System**