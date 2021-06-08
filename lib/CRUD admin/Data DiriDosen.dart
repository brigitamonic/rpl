import 'dart:convert';

import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'package:rpl_app/CRUD dosen/AddEditPageDosen.dart';

import 'AddEditPageDosen.dart';


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
      home: DataDiriDosenk(),
    );
  }
}
class DataDiriDosenk extends StatefulWidget {
  @override
  _DataDiriDosenk createState() => _DataDiriDosenk();
}

class _DataDiriDosenk extends State<DataDiriDosenk> {


  Future getData()async{
    var response = await http.get(Uri.parse("http://192.168.43.47/rpl/readDosen.php"));
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
      ),
      floatingActionButton: FloatingActionButton(
        child: Icon(Icons.add),
        onPressed: (){
          Navigator.push(context, MaterialPageRoute(builder: (context) => AddEditPageDosenk(),),);
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
                      Navigator.push(context, MaterialPageRoute(builder: (context) => AddEditPageDosenk(list: list,index: index,),),);
                      debugPrint('Edit Clicked');
                    },),
                  title: Text(list[index]['nm_dosen']),
                  subtitle: Text(list[index]['nidn']),
                  trailing: GestureDetector(child: Icon(Icons.delete),
                    onTap: (){
                      setState(() {
                         http.post(Uri.parse("http://192.168.43.47/rpl/deleteDosen.php"),body: {
                          'nidn' : list[index]['nidn'],
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
