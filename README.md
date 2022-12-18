**laravel留言板後端**  
#messageBoard-backend  

**安装方法:**  
1.git clone https://github.com/jason3512/messageBoard.git  
2.cd messageBoard  
3.composer install  
4.vim .env //修改資料庫    
5.php artisan migrate //建立table 
6.php artisan serve  

**取得全部留言**  
```php
ApiUrl : api/messages/  
Methor : GET  
Respons :   
{  
  //成功OK回傳true   
  "ok":true,    
  "messages":  
        {  
        "id":25,  
        "member":"member",  
        "message":"msg",  
        "created_at":"2022-12-18 17:26:05"  
        },  
        {  
        "id":24,  
        "member":"44",  
        "message":"5asd",
        "created_at":"2022-12-18T17:25:59.000000Z"
        }
}
```

**新增留言**
```php
ApiUrl : api/messages/
Methor : POST
body參數 : 
{
        "member":"member", 
        "message":"msg"
}
Respons : 成功回傳success 
          失敗回傳Exception訊息
```

**ID取得留言**
```php
ApiUrl : api/messages/{message_id}
Methor : GET
Respons : 
{
  "messages":
        {
        "id":25,
        "member":"member",
        "message":"msg",
        "created_at":"2022-12-18 17:26:05"
        }
}
```

**修改留言**
```
ApiUrl : api/messages/{message_id}
Methor : PUT
body參數 : 
{
        "member":"member", 
        "message":"msg"
}
Respons : 成功回傳success 
          失敗回傳Exception訊息
```

**刪除留言**
```php
ApiUrl : api/messages/{message_id}
Methor : DELETE
Respons : 成功回傳success 
          失敗回傳Exception訊息
```
