## [HttpRequest java网络请求工具](http://code.darren.work/java_HttpRequest/)

一个超简单的java网络请求工具，主要应对于和类似于微信等接口通信请求、第三方Http接口请求等操作

支持链式写法，Api简单。代码写的一般般...

```java
//直接Get请求，并返回网页的内容字符串
HttpRequest.get("https://www.baidu.com").send();
```

```java
//直接Post请求，并返回网页的内容字符串
HttpRequest.post("https://www.baidu.com").send();
```

```java
//设置请求参数
HttpRequest.get("https://www.baidu.com/s")
  .put("ie", "UTF-8")//添加请求参数
  .put("wd","darren's blog")
  .send();//执行请求
```

```java
//设置请求参数 方法2
Map<String,Object> param = new HashMap<String,Object>();
param.put("ie", "UTF-8");
param.put("wd", "darren's blog");
HttpRequest.get("https://www.baidu.com/s")
  .put(param)//添加多个请求参数
  .send();
HttpRequest.post("https://www.baidu.com/s")
  .send(param);//Post方式send Map参数时也会拼接成QueryString的形式
```

```java
//设置Post请求非键值对的参数（如微信公众号接口参数，需要传Json字符串或者xml字符串等）
HttpRequest.post("apiurl").send("<xml><key>foo</key><value>bar</value></xml>");
HttpRequest.post("apiurl").send("{jsonkey:jsonValue}");
```

```java
//设置请求和相应的编码解决乱码问题，不设置默认为UTF-8
HttpRequest.post("apiurl")
  .reqCharset("GBK")//设置Request和请求参数的编码
  .respCharset("GBK")//设置Response的内容的编码
  .send();
```

```java
//设置UserAgent和Referer解决一些接口防盗链或设备验证的问题
HttpRequest.post("apiurl")
  .referer("http://www.baidu.com")//设置Referer，默认Referer等于请求的根域名
  .userAgent("custom useragent")//设置UserAgent，默认的UA等于IE11的UA
  .send();
```

```java
//文件下载，返回值为是否成功（true/false），本地下载的路径一定要存在
Boolean success = HttpRequest.get("http://www.qq.com/favicon.ico")
  .download("D:\\download\\favicon.ico");//下载文件并设置下载文件的路径和名称
```

```java
//微信退款接口设置证书和key，因为是自用的，所以没写的特别通用
//针对于其他ssl双向证书认证的接口可能需要自己修改一下KeyManagerFactory和KeyStore部分的代码
HttpRequest.post("微信退款接口URL")
  .sslConfig("微信证书Key","微信证书文件路径")//针对于微信支付中的退款接口需要设置双向SSL证书认证的
  .send("balabala");
```

