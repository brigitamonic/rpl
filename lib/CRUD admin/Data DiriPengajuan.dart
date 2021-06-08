import 'dart:convert';

import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'package:rpl_app/user/AddEditPage.dart';

import 'Pengajuan.dart';


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
      home: DataDiriPengajuan(),
    );
  }
}
class DataDiriPengajuan extends StatefulWidget {
  @override
  _DataDiriPengajuan createState() => _DataDiriPengajuan();
}

class _DataDiriPengajuan extends State<DataDiriPengajuan> {


  Future getData()async{
    var response = await http.get(Uri.parse("http://192.168.43.47/rpl/pengajuanread.php"));
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
        Navigator.push(context, MaterialPageRoute(builder: (context) => AddEditPagePengajuank(),),);
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
                      Navigator.push(context, MaterialPageRoute(builder: (context) => AddEditPagePengajuank(list: list,index: index,),),);
                      debugPrint('Edit Clicked');
                    },),
                  title: Text(list[index]['mhs']),
                  subtitle: Text(list[index]['mhs']),
                  trailing: GestureDetector(child: Icon(Icons.delete),
                    onTap: (){
                      setState(() {
                         http.post(Uri.parse("http://192.168.43.47/rpl/delete.php"),body: {
                          'mhs' : list[index]['mhs'],
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
