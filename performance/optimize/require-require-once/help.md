尽量使用include, 而不是include_once, 以前最多的理由的是,include_once需要查询一遍已加载的文件列表, 确认是否存在, 然后再加载

 require is faster than require_once  due to the high number of operational
 stat calls made when importing the php script

 if  /var/shared/htdocs/myapp/models/MyModels/ClassA.php, the os will make a
 stat call within each of the dirs before it reaches ClassA.php, this is 6
 stat calls

 require： 引入一个文件，运行时编译引入.
 require_once： 功能等同于require，只是当这个文件被引用过后，不再编译引入

