## /merchants ##

### `GET` /merchants ###

_List all merchants._

List all merchants.

#### Response ####

merchants[]:

  * type: array of objects (Merchant)

merchants[][name]:

  * type: string
  * description: Merchant name

merchants[][description]:

  * type: string
  * description: Merchant description

merchants[][id]:

  * type: integer
  * description: Merchant unique ID

merchants[][coupons][]:

  * type: array of objects (Coupon)
  * description: List of merchant coupons

merchants[][coupons][][title]:

  * type: string
  * description: Coupon title

merchants[][coupons][][code]:

  * type: string
  * description: Unique coupon code

merchants[][coupons][][id]:

  * type: integer
  * description: Unique coupon ID


## /merchants/{id} ##

### `DELETE` /merchants/{id} ###

_Delete a mercahnt_

Delete a mercahnt

#### Requirements ####

**id**

  - Type: d+
  - Description: Merchant ID


### `GET` /merchants/{id} ###

_Show merchant with a given ID._

Show merchant with a given ID.

#### Requirements ####

**id**

  - Type: integer
  - Description: Merchant ID

#### Response ####

name:

  * type: string
  * description: Merchant name

description:

  * type: string
  * description: Merchant description

id:

  * type: integer
  * description: Merchant unique ID

coupons[]:

  * type: array of objects (Coupon)
  * description: List of merchant coupons

coupons[][title]:

  * type: string
  * description: Coupon title

coupons[][code]:

  * type: string
  * description: Unique coupon code

coupons[][id]:

  * type: integer
  * description: Unique coupon ID


## /merchants/{id}/coupons ##

### `GET` /merchants/{id}/coupons ###

_List coupons of a given merchant._

List coupons of a given merchant.

#### Requirements ####

**id**

  - Type: integer
  - Description: ID of a merchant which coupons to get

#### Response ####

coupons[]:

  * type: array of objects (Coupon)

coupons[][title]:

  * type: string
  * description: Coupon title

coupons[][code]:

  * type: string
  * description: Unique coupon code

coupons[][id]:

  * type: integer
  * description: Unique coupon ID


## /users ##

### `GET` /users ###

_List all users._

List all users.

#### Response ####

users[]:

  * type: array of objects (User)

users[][name]:

  * type: string
  * description: Unique user name

users[][mail]:

  * type: string
  * description: User email address

users[][created_at]:

  * type: DateTime
  * description: When user was created

users[][token]:

  * type: string
  * description: Automatically generated token

users[][id]:

  * type: integer
  * description: Primary identifier of a user


### `POST` /users ###

_Create a new user._

Create a new user.

#### Parameters ####

name:

  * type: string
  * required: true
  * description: Unique user name

mail:

  * type: string
  * required: true
  * description: User email address

pass:

  * type: string
  * required: true
  * description: User password

created_at:

  * type: DateTime
  * required: false
  * description: When user was created

token:

  * type: string
  * required: false
  * description: Automatically generated token

id:

  * type: integer
  * required: false
  * description: Primary identifier of a user


## /users/{id} ##

### `DELETE` /users/{id} ###

_Delete a user_

Delete a user

#### Requirements ####

**id**

  - Type: d+
  - Description: User ID


### `PATCH` /users/{id} ###

_Update an exiting user._

Update an exiting user.

#### Requirements ####

**id**

  - Type: d+
  - Description: User ID

#### Parameters ####

name:

  * type: string
  * required: false
  * description: Unique user name

mail:

  * type: string
  * required: false
  * description: User email address

pass:

  * type: string
  * required: false
  * description: User password

created_at:

  * type: DateTime
  * required: false
  * description: When user was created

token:

  * type: string
  * required: false
  * description: Automatically generated token

id:

  * type: integer
  * required: false
  * description: Primary identifier of a user


## /users/{id}/coupons ##

### `GET` /users/{id}/coupons ###

_List coupons of a given user._

List coupons of a given user.

#### Requirements ####

**id**

  - Type: integer
  - Description: ID of a user whose coupons to get

#### Response ####

coupons[]:

  * type: array of objects (Coupon)

coupons[][title]:

  * type: string
  * description: Coupon title

coupons[][code]:

  * type: string
  * description: Unique coupon code

coupons[][id]:

  * type: integer
  * description: Unique coupon ID


## /users/{token} ##

### `GET` /users/{token} ###

_Show user with a given token._

Show user with a given token.

#### Requirements ####

**token**

  - Type: string
  - Description: User's token

#### Response ####

name:

  * type: string
  * description: Unique user name

mail:

  * type: string
  * description: User email address

created_at:

  * type: DateTime
  * description: When user was created

token:

  * type: string
  * description: Automatically generated token

id:

  * type: integer
  * description: Primary identifier of a user
