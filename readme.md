# wecart-api
*note: all creadentials found here are voided.*

**description:** A comprehensive documentation of wecart-api.

### Format

wecart API is represented in JSON format, example:
```
[
    {
        "acc_type": "seller",
        "store_name": "Apple",
        "description": "Gadget Store",
        "full_name": "Dan",
        "username": "Danjej3m0n",
        "password": "0a113ef6b61820daa5611c870ed8d5ee",
        "brgy": "Bauan",
        "sitio": "Villa Chuchu",
        "street": "Bulag Street",
        "contact_num": "09123456789",
        "contact_email": "redacted@gmail.com"
    }
]
```

~~We use a termporary API Server at the moment.~~ Paki copy paste nalang ng maigi thankyou.

Live API is now available at: ***
## Buyer: 'item received' ![#c5f015](https://via.placeholder.com/15/c5f015/000000?text=+) `NEW`
```
/wecart-api/deliver.php?buyer_delivered&buyer=[BUYER_USERNAME]&tracking_id=[TRACKING_ID]&key=[KEY_HERE]
```
## Check if user is already verified
```
/wecart-api/confirm.php?email=[USER_EMAIL]
```
## Reset Password
```
/wecart-api/forgot_password.php?email=[USER_EMAIL]
```
## Agent: List of Active Agents 
```
/wecart-api/agent.php?active_list
```
## Agent: Away OFF
```
/wecart-api/agent.php?away_off=[AGENT_USERNAME]
```
## Agent: Away ON
```
/wecart-api/agent.php?away_on=[AGENT_USERNAME]
```
## Edit agent info
```
/wecart-api/edituserinfo.php?agent&username=[USERNAME_YOU_WANT_TO_UPDATE]&name=[NEW_NAME]}&brgy=[NEW_BARANGAY]&sitio=[NEW_SITIO]&street=[NEW_STREET]&contact_num=[NEW_CONTACT_NUM]&contact_email=[NEW_EMAIL]
```
## Admin: Seller Report
```
/wecart-api/dashboard.php?seller=[SELLER_USERNAME]
```
## Admin: Online Users dashboard 
```
/wecart-api/dashboard.php
```
## Buyer: Resend email link
```
/wecart-api/resend-code.php?email=[BUYER_EMAIL]
```
## Seller: 'Ready for delivery.
```
/wecart-api/deliver.php?ship_ready&tracking_id=[TRACKING_ID]&uname_1=[SELLER_USERNAME]
```
## Agent: 'Package is out for delivery.' 
```
/wecart-api/deliver.php?ship_now&rider=[AGENT_USERNAME]&tracking_id=[TRACKING_ID]&key=[KEY_HERE]
```
## edit Product Quantity
```
/wecart-api/show-orders.php?update&username=[USERNAME]&product_name=[PRODUCT_NAME]&seller_uname=[SELLER_USERNAME]&quantity=[NEW_QUANTITY]
```
## Agent: 'Package has been delivered.'
```
/wecart-api/deliver.php?ship_success&tracking_id=[TRACKING_ID]
```
## Agent: 'Failed delivery.' 
```
/wecart-api/deliver.php?ship_fail&tracking_id=[TRACKING_ID]
```
## Track List 
```
/wecart-api/show-orders.php?tracklist&username=[USERNAME]
```
## Track Order 
```
/wecart-api/show-orders.php?track=[TRACKING_ID]
```
## Seller/Agent Summary 
```
SELLER:
/wecart-api/deliver.php?seller=[SELLER_USERNAME]&tracking_id=[TRACKING_ID]

AGENT:
/wecart-api/deliver.php?agent=[AGENT_USERNAME]&tracking_id=[TRACKING_ID]
```
## developer utility
```
DELETE SPECIFIC ORDER:
/wecart-api/delete.php?buyer_user=[BUYER_USERNAME]&seller_user=[SELLER_USERNAME]&product=[PRODUCT_NAME]

DELETE ALL BUYER RECORD:
/wecart-api/delete.php?allbuyer

DELETE SPECIFIC BUYER:
/wecart-api/delete.php?buyer=[USERNAME]

DELETE ALL SELLER RECORD:
/wecart-api/delete.php?allseller

DELETE SPECIFIC SELLER:
/wecart-api/delete.php?seller=[USERNAME]

DELETE ALL AGENT RECORD:
/wecart-api/delete.php?allagent

DELETE SPECIFIC AGENT:
/wecart-api/delete.php?agent=[USERNAME]

DELETE ALL PRODUCT RECORD:
https://wecart.gq/wecart-api/delete.php?allproduct

DELETE SPECIFIC PRODUCT:
/wecart-api/delete.php?seller=[SELLER_USERNAME]&product_name=[RPODUCT_NAME_YOU_WANT_TO_DELETE]
```
## Order/Transaction
```
Order/Transaction is separated into three(3) steps
add cart:
/wecart-api/add-to-cart.php?action=add_cart&username=[BUYER_USERNAME]&seller=[SELLER_USERNAME]&product_name=[PRODUCT_NAME]&quantity=[PRODUCT_QUANTITY]

choose an agent:
/wecart-api/add-to-cart.php?action=choose_agent&username=[BUYER_USERNAME]&agent=[AGENT_NAME]

summary order:
/wecart-api/add-to-cart.php?action=order_summary&username=[BUYER_USERNAME]&mop=[MODE_OF_PAYMENT] 

place_order:
/wecart-api/add-to-cart.php?action=place_order&username=[BUYER_USERNAME]
```
## View TRANSACTION HISTORY 
```
/wecart-api/show-orders.php?history=[BUYER_USERNAME]
```
## View BUYER Cart
```
wecart-api/show-orders.php?iscart=[BUYER_USERNAME]
```
## View Seller Orders
```
/wecart-api/show-orders.php?seller=[SELLER_USERNAME]
```
## View buyer Orders 
```
/wecart-api/show-orders.php?buyer=[BUYER_USERNAME]
```
## View Agent Customers
```
/wecart-api/show-orders.php?agent=[AGENT_USERNAME]
```
## search product
```
/wecart-api/search.php?product=[PRODUCT_NAME]
```
## show all stores/seller 
```
/wecart-api/showusers.php?storelist
OR
/wecart-api/showusers.php?sellerlist
```
## show all agents 
```
/wecart-api/showusers.php?agentlist
```
## show all buyers 
```
/wecart-api/showusers.php?buyerlist
```
# show online agents 
```
/wecart-api/showusers.php?agentlist=isactive
```
## show all registered users 
```
https://wecart.gq/wecart-api/showusers.php
```
# Seller: add product 
```
/wecart-api/add_product.php?username=[USERNAME]&product_name=[PRODUCT_NAME]&product_type=[PRODUCT_TYPE]&description=[DESCRIPTION]&stock=[STOCK]&price=[PRICE]
```
## edit product info 
```
NOTE -> pag nde nyo usto i-update example yong name or etc, ilagay nyo lang current info and proceed dun sa usto mo i-update.

/wecart-api/editproductinfo.php?username=[SELLER_USERNAME]&old_product=[OLD_PRODUCT_NAME]&product_name=[NEW_PRODUCT_NAME]&product_type=[NEW_PRODUCT_TYPE]&description=[NEW_DESCRIPTION]&price=[NEW_PRICE]&stock=[NEW_STOCK]

```
## edit user/seller info 
```
NOTE -> pag nde nyo usto i-update example yong name or etc, ilagay nyo lang current info and proceed dun sa usto mo i-update.
buyer:
/wecart-api/edituserinfo.php?buyer&username=[USERNAME_YOU_WANT_TO_UPDATE]&name=[NEW_NAME]}&brgy=[NEW_BARANGAY]&sitio=[NEW_SITIO]&street=[NEW_STREET]&contact_num=[NEW_CONTACT_NUM]&contact_email=[NEW_EMAIL]

seller
//wecart-api/edituserinfo.php?seller&username=[USERNAME_YOU_WANT_TO_UPDATE]&name=[NEW_NAME]}&brgy=[NEW_BARANGAY]&sitio=[NEW_SITIO]&street=[NEW_STREET]&contact_num=[NEW_CONTACT_#]&contact_email=[NEW_EMAIL]&store_name=[NEW_STORE_NAME]&decription=[NEW_DESCRIPTION]&store_type=[NEW_STORE_TYPE]
```
## register user
```
https://wecart.gq/wecart-api/register.php?buyer&name=[FULL_NAME_HERE]&username=[USERNAME]&password=[PASSWORD]&brgy=[BARANGAY]&sitio=[SITIO]&street=[STREET]&contact_num=[CONTACT_NUMBER]&contact_email=[CONTACT_EMAIL]
```
## register agent
```
/wecart-api/register.php?agent&name=[AGENT_NAME]&username=[AGENT_USERNAME]&password=[AGENT_PASSWORD]&brgy=[BARANGAY]&sitio=[SITIO]&street=[STREET]&contact_num=[AGENT_CONTACT_NUMBER]&contact_email=[AGENT_CONTACT_EMAIL]
```
## register seller
```
/wecart-api/register.php?seller&store_name=[STORE_NAME]&store_type=[TYPE_OF_STORE]&description=[STORE_DESCRPITION]&name=[FULL_NAME_HERE]&username=[USERNAME]&password=[PASSWORD]&brgy=[BARANGAY]&sitio=[SITIO]&street=[STREET]&contact_num=[CONTACT_NUMBER]&contact_email=[CONTACT_EMAIL]
```
## Login
```
/wecart-api/login.php?username=[USERNAME]&password=[PASSWORD]
```
## Logout
```
/wecart-api/logout.php?username=[USERNAME]
```
## change password
```
https://wecart.gq/wecart-api/changepass.php?username=[USERNAME]&oldpass=[CONFIRM_OLD_PASSWORD]&newpass=[NEW_PASSWORD]

```
## show user profile-info
```
/wecart-api/profile_info.php?username=[USERNAME]

```
# upload user profile photo
```
POST: username, image, name => /wecart-api/upload_user_profile.php
```
# show online users
```
/wecart-api/showusers.php?isactive
```
# Seller: add product (product image)
```
POST: username, product_name, image, name => /wecart-api/product_image_upload.php
```
# show all products
```
/wecart-api/showproducts.php
```
# show all products from specific seller
```
q/wecart-api/showproducts.php?seller=[SELLER_USERNAME]
```
# show product type from specific seller 
```
/wecart-api/showproducts.php?seller=[SELLER_USERNAME]&product_type=[product_type]
```
