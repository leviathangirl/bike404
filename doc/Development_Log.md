# bike404 开发日志
最新日志写在最后面

## 归档
我用了2天，每天只抽出一点点时间，就coding完成了这个网站的后端初始代码。但用了2个星期，也没有搞定前端代码。

前端的代码我只了解一点jquery、ztree和highcharts，对css完全不懂。

最初的想法，是想用amaze ui做前端的，在每个accordion中加上image slider，在每条信息的详情页中再用image slider with thumbnail做图片展示。但是太难了，amaze ui把所有标签得style都自定义了，导致很多的slider插件都排版错误。即使在详情页中抛去amaze ui的css文件，世面上也没有多少能不研究就能调用的免费JS插件，多数插件根本不提供API文档或者API文档满篇胡话。当然也可能是我之前使用的php、jquery文档写的都太细致了，导致我根本无法接受坏文档的插件。

我自己也用js写过image slider with thumbnail插件，功能上倒是实现了，但是由于css样式文件完全搞不定，所以图片弄着弄着就开始错版错位，写了2天最后也放弃了，改用amaze ui的Gallery。说真心话amaze ui的文档我也是读的不明所以，他给出的Demo中，default（2列）和default（3列）在展示上到底有什么区别我折腾了很久也没看出什么区别。

## 2016-05-12
前端已启用 amaze ui，原因之一是 amaze ui 的文档写的太模糊，原因之二是 amaze ui 的 css 污染太严重。。现在使用的是 [materialize](http://materializecss.com/) ，文档比较全，代码也比较简洁。
