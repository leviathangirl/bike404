因本站仍在设计制作中，接口可能会有所变动。如果您需要调用这些接口，建议您向本站开发者发送邮件，这样一旦接口有变动，您将会受到接口变化细节的邮件通知。

所有丢失车辆列表：
请求方式：GET
请求地址：http://192.168.214.130/newProject/web/index.php/Home/api/getlist
请求参数：无
返回数据示例：
```
{
    "error_code": 0,
    "error_msg": "success",
    "result": [{
        "id": "3",
        "area": "\u5317\u4eac",
        "brand": "\u7f8e\u5229\u8fbe",
        "sub_brand": "\u4ed8\u5229\u5a01",
        "color": "\u6a59\u8272",
        "type": "\u5c71\u5730\u8f66",
        "alerted_police": "0",
        "status": "0",
        "info": "\u672c\u4eba\u4e8e2016\u5e744\u670820\u65e5\u65e9\u4e0a\u7ea67:50\u65f6\u5c06\u81ea\u884c\u8f66\u505c\u5728\u56de\u9f99\u89c2\u4e1c\u5927\u8857\u5730\u94c1\u7ad9D\u53e3\u505c\u8f66\u68da\u5185\u3002\u665a\u4e0a19:20\u65f6\u53d1\u73b0\u88ab\u76d7\u3002\u56e0\u4e3a\u81ea\u5df1\u4e0d\u662f\u65e5\u672c\u4eba\uff0c\u88ab\u76d7\u8f66\u8f86\u4ef7\u503c\u4e0d\u8fc7\u4e07\u6240\u4ee5\u6ca1\u6709\u62a5\u8b66\u3002\u88ab\u76d7\u7684\u662f\u4e00\u8f86\u5c4e\u9ec4\u8272\u7f8e\u5229\u8fbe\u4ed8\u5229\u5a01500\uff0c\u6b64\u8f66\u578b\u5728\u5317\u4eac\u5e76\u4e0d\u591a\u89c1\u3002\u914d\u56fe\u662f\u53bb\u5e74\u62cd\u7684\uff0c\u4e22\u7684\u65f6\u5019\u6ca1\u6709\u8f66\u7b50\uff0c\u5e74\u521d\u66f4\u6362\u8fc7\u7259\u76d8\u62a4\u76d8\u548c\u652f\u6491\u67b6\u3002",
        "user": "admin",
        "email": "admin@email.com",
        "contact": "15600000000",
        "descrpition": null,
        "uuid": "00000000-0000-0000-0000-000000000000",
        "lost_time": "2016-04-20 00:00:00",
        "create_time": "2016-04-25 11:24:51",
        "update_time": "2016-04-25 11:24:51"
    }, {
        "id": "4",
        "area": "\u897f\u5b89",
        "brand": null,
        "sub_brand": null,
        "color": "\u7eff\u8272",
        "type": "\u5c71\u5730\u8f66",
        "alerted_police": "0",
        "status": "0",
        "info": "\u5b66\u6821\u5f00\u5b66\u540e\u8f66\u5b50\u5c31\u4e0d\u89c1\u4e86\u3002",
        "user": "",
        "email": "",
        "contact": null,
        "descrpition": null,
        "uuid": "00000000-0000-0000-0000-000000000000",
        "lost_time": "2012-09-05 00:00:00",
        "create_time": "2016-04-25 11:46:59",
        "update_time": "2016-04-25 11:46:59"
    }]
}


```
返回数据说明：
- error_code：返回数据状态码，为0表示正确，不为0表示出错
- error_msg：返回数据状态信息
- result：查询结果数据：
- id：ID
- area：丢失车辆的地区
- brand：丢失车辆的品牌
- sub_brand：丢失车辆的次要品牌
- color：丢失车辆的颜色
- type：丢失车辆的车型
- alerted_police：报警状态。0为未报警，1为已报警
- status：丢失状态。0为未找回，1为已由自己找回，2为已通过本站信息找回，3为通过公安找回，4为通过其他网站找回，5为自己购回
- info：其他详细信息
- lost_time：车辆丢失时间
- create_time：条目创建时间
- update_time：条目更新时间
- URL：此条目的信息页面地址

所有中文都经由 JSON_UNESCAPED_UNICODE 编码。


随机获取一条丢失车辆的信息：
请求方式：GET
请求地址：http://192.168.214.130/newProject/web/index.php/Home/api/get
请求参数：无
返回数据示例：
```
{
    "error_code": 0,
    "error_msg": "success",
    "result": {
        "id": "3",
        "title": "\u5bfb\u8f66",
        "keyword": null,
        "area": "\u5317\u4eac",
        "brand": "\u7f8e\u5229\u8fbe",
        "sub_brand": "\u4ed8\u5229\u5a01",
        "color": "\u6a59\u8272",
        "type": "\u5c71\u5730\u8f66",
        "alerted_police": "0",
        "status": "0",
        "info": "\u672c\u4eba\u4e8e2016\u5e744\u670820\u65e5\u65e9\u4e0a\u7ea67:50\u65f6\u5c06\u81ea\u884c\u8f66\u505c\u5728\u56de\u9f99\u89c2\u4e1c\u5927\u8857\u5730\u94c1\u7ad9D\u53e3\u505c\u8f66\u68da\u5185\u3002\u665a\u4e0a19:20\u65f6\u53d1\u73b0\u88ab\u76d7\u3002\u56e0\u4e3a\u81ea\u5df1\u4e0d\u662f\u65e5\u672c\u4eba\uff0c\u88ab\u76d7\u8f66\u8f86\u4ef7\u503c\u4e0d\u8fc7\u4e07\u6240\u4ee5\u6ca1\u6709\u62a5\u8b66\u3002\u88ab\u76d7\u7684\u662f\u4e00\u8f86\u5c4e\u9ec4\u8272\u7f8e\u5229\u8fbe\u4ed8\u5229\u5a01500\uff0c\u6b64\u8f66\u578b\u5728\u5317\u4eac\u5e76\u4e0d\u591a\u89c1\u3002\u914d\u56fe\u662f\u53bb\u5e74\u62cd\u7684\uff0c\u4e22\u7684\u65f6\u5019\u6ca1\u6709\u8f66\u7b50\uff0c\u5e74\u521d\u66f4\u6362\u8fc7\u7259\u76d8\u62a4\u76d8\u548c\u652f\u6491\u67b6\u3002",
        "image": ["http:\/\/192.168.214.130\/newProject\/web\/Public\/temp\/3\/IMG_20140513_191311.jpg", "http:\/\/192.168.214.130\/newProject\/web\/Public\/temp\/3\/IMG_20151220_140416.jpg", "http:\/\/192.168.214.130\/newProject\/web\/Public\/temp\/3\/IMG_20160214_175001.jpg", "http:\/\/192.168.214.130\/newProject\/web\/Public\/temp\/3\/IMG_20160214_175010.jpg"],
        "user": "admin",
        "email": "admin@email.com",
        "contact": "15600000000",
        "descrpition": null,
        "uuid": "00000000-0000-0000-0000-000000000000",
        "lost_time": "2016-04-20 00:00:00",
        "create_time": "2016-04-25 11:24:51",
        "update_time": "2016-04-25 11:24:51"
    }
}

```
