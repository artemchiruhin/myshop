# :shopping_cart: Интернет-магазин

Проект был создан во время учебной практики. Имеется разделение прав пользователя и администратора. Администратор может управлять всей информацией (CRUD). Все маршруты администратора защищены от пользователя с помощью middleware. Пользователь может совершать заказы.

Использованные технологии: **Laravel**

Все модули проекта распределены по своим директориям. Названия файлов отражают их суть. При наименовании чего-либо придерживался ресурсного стиля, принятого в Laravel.

База данных была создана с помощью миграций.

## :cinema: Демонстрация проекта:

Главная, регистрация, авторизация

![Demo](https://media.giphy.com/media/MxZu5slmYQbboSZUcJ/giphy.gif)

Панель администратора

![Demo](https://media.giphy.com/media/3khWwwprdQDrlRQWAZ/giphy.gif)

Функционал пользователя

![Demo](https://media.giphy.com/media/QWfT5nBOuM2tNhapmm/giphy.gif)

## :twisted_rightwards_arrows: Созданные маршруты

| № | Путь | Название | Http метод | Middleware | Контроллер, метод |
| --- | --- | --- | --- | --- | --- |
| 1 | / | index | GET | x | IndexController, index |
| 2 | /register | register | GET | guest | RegisterController, index |
| 3 | /register | register | POST | guest | RegisterController, store |
| 4 | /login | login | GET | guest | LoginController, index |
| 5 | /login | login | POST | guest | LoginController, login |
| 6 | /logout | logout | GET | auth | LoginController, logout |
| 7 | /products | products.index | GET | x | User\ProductController, index |
| 8 | /products/{product} | products.show | GET | x | User\ProductController, show |
| 9 | /products/{product}/add-to-cart | products.addToCart | POST | auth | User\ProductController, addProductToCart |
| 10 | /products/{product}/remove-from-cart | products.removeFromCart | POST | auth | User\ProductController, removeProductFromCart |
| 11 | /products/{product}/make-comment | products.makeComment | POST | auth | CommentController, store |
| 12 | /cart | cart.index | GET | auth | CartController, index |
| 13 | /cart/make-order | cart.makeOrder | POST | auth | CartController, makeOrder |
| 14 | /admin | admin.index | GET | auth, admin | IndexController, dashboard |
| 15 | /admin/categories | admin.categories.index | GET | auth, admin | CategoryController, index |
| 16 | /admin/categories/create | admin.categories.create | GET | auth, admin | CategoryController, create |
| 17 | /admin/categories/create | admin.categories.create | POST | auth, admin | CategoryController, store |
| 18 | /admin/categories/{category}/edit | admin.categories.edit | GET | auth, admin | CategoryController, edit |
| 19 | /admin/categories/{category}/edit | admin.categories.edit | PUT | auth, admin | CategoryController, update |
| 20 | /admin/categories/{category} | admin.categories.destroy | DELETE | auth, admin | CategoryController, destroy |
| Маршруты | для | товаров | аналогичны |  |  |
| 21 | /admin/orders | admin.orders.index | GET | auth, admin | OrderController, index |
| 22 | /admin/orders/{order}/change-status | admin.orders.change-status-order | GET | auth, admin | OrderController, edit |
| 23 | /admin/orders/{order}/change-status | admin.orders.change-status-order | POST | auth, admin | OrderController, update |

## :deciduous_tree: Структура функциональной части проекта проекта

Что создано мной и **важно** показать. Как видите, всё распределено по своим разделам.
```
.
├── app
|   ├── Http
|   |   ├── Controllers
|   |   |   ├── Admin
|   |   |   |   ├── CategoryController.php
|   |   |   |   ├── OrderController.php
|   |   |   |   └── ProductController.php
|   |   |   ├── Auth
|   |   |   |   ├── LoginController.php
|   |   |   |   └── RegisterController.php
|   |   |   ├── User
|   |   |   |   ├── CartController.php
|   |   |   |   └── ProductController.php
|   |   |   └── IndexController.php
|   |   ├── Middleware
|   |   |   └── IsAdmin.php
|   |   └── Requests
|   |       ├── CategoryFormRequest.php
|   |       ├── ChangeStatusOrderFormRequest.php
|   |       ├── CommentFormRequest.php
|   |       ├── LoginFormRequest.php
|   |       ├── ProductFormRequest.php
|   |       ├── ProductFormUpdateRequest.php
|   |       └── RegisterFormRequest.php
|   └── Models
|       ├── Category.php
|       ├── Comment.php
|       ├── Order.php
|       ├── Product.php
|       └── User.php
```
