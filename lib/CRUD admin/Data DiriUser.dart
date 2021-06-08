import 'dart:convert';

import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'package:rpl_app/user/AddEditPage.dart';

import 'AddEditPageUser.dart';


class MyApp extends StatelessWidget {
  // This widget is the root of your application.
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'Flutter Demo',
      theme: ThemeData(

        primarySwatch: Colors.blue,

        visualDensity: VisualDensity.adaptivePlatformDensity,
      ),
      home: DataDiriUserk(),
    );
  }
}
class DataDiriUserk extends StatefulWidget {
  @override
  _DataDiriUserk createState() => _DataDiriUserk();
}

class _DataDiriUserk extends State<DataDiriUserk> {


  Future getData()async{
    var response = await http.get(Uri.parse("http://192.168.43.47/rpl/read.php"));
    return json.decode(response.body);
  }


  @override
  void initState() {
    super.initState();

  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text('Php Mysql Crud'),
      ), floatingActionButton: FloatingActionButton(
      child: Icon(Icons.add),
      onPressed: (){
        Navigator.push(context, MaterialPageRoute(builder: (context) => AddEditPagek(),),);
        debugPrint('Clicked FloatingActionButton Button');
      },
    ),

      body: FutureBuilder(
        future: getData(),
        builder: (context,snapshot){
          if(snapshot.hasError) print(snapshot.error);
          return snapshot.hasData
              ? ListView.builder(
              itemCount: snapshot.data.length,
              itemBuilder: (context,index){
                List list = snapshot.data;
                return ListTile(
                  leading: GestureDetector(child: Icon(Icons.edit),
                    onTap: (){
                      Navigator.push(context, MaterialPageRoute(builder: (context) => AddEditPagek(list: list,index: index,),),);
                      debugPrint('Edit Clicked');
                    },),
                  title: Text(list[index]['nm_mhs']),
                  subtitle: Text(list[index]['nim']),
                  trailing: GestureDetector(child: Icon(Icons.delete),
                    onTap: (){
                      setState(() {
                         http.post(Uri.parse("http://192.168.43.47/rpl/delete.php"),body: {
                          'nim' : list[index]['nim'],
                        });
                      });
                      debugPrint('delete Clicked');
                    },),
                );
              }
          )
              : CircularProgressIndicator();
        },
      ),
    );
  }
}
