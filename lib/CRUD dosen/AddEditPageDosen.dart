import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'package:rpl_app/main.dart';
import 'dart:convert';
import 'package:rpl_app/user.dart';
import 'package:rpl_app/CRUD dosen/Data DiriDosen.dart';

import 'package:flutter/services.dart';

class AddEditPageDosen extends StatefulWidget {
  final List list;
  final int index;
  AddEditPageDosen({this.list,this.index});
  @override
  _AddEditPageDosenState createState() => _AddEditPageDosenState();
}

class _AddEditPageDosenState extends State<AddEditPageDosen> {
  String _jk="";

  var _formKey =  GlobalKey<FormState>();
  TextEditingController nidn  = TextEditingController();
  TextEditingController nama = TextEditingController();
  TextEditingController jk = TextEditingController();
  TextEditingController email = TextEditingController();
  TextEditingController telp = TextEditingController();
  bool editMode = false;


  void _pilihJk(String value) {
    setState(() {
      _jk = value;
    });
  }

  addUpdateData(){
    if(editMode){
      http.post(Uri.parse("http://192.168.43.47/rpl/editDosen.php"),body: {
        'nidn' : nidn.text,
        'nm_dosen' : nama.text,
        'jk_dsn' : jk.text,
        'email_dsn' : email.text,
        'telp_dsn' : telp.text,

      });

    }else{
      http.post(Uri.parse("http://192.168.43.47/rpl/addDosen.php"),body: {
        'nidn' : nidn.text,
        'nm_dosen' : nama.text,
        'jk_dsn' : jk.text,
        'email_dsn' : email.text,
        'telp_dsn' : telp.text,
      });

    }

  }


  @override
  void initState() {
    super.initState();
    if(widget.index != null){
      editMode = true;
      nidn.text = widget.list[widget.index]['nidn'];
      nama.text = widget.list[widget.index]['nm_dosen'];
      jk.text = widget.list[widget.index]['jk_dsn'];
      email.text = widget.list[widget.index]['email_dsn'];
      telp.text = widget.list[widget.index]['telp_dsn'];
    }

  }


  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(title: Text(editMode ? 'Update' :'Add Data'),),

      body: ListView(
        key: _formKey,
        children: <Widget>[
          Padding(
            padding: const EdgeInsets.all(8.0),
            child: TextFormField(
              controller: nidn,
              keyboardType: TextInputType.number,
              decoration: InputDecoration(
                labelText: 'Nidn',
              ),
              validator: (value)=>
              (value.length <9) ? "sudah cukup" :null,
            ),
          ),
          Padding(
            padding: const EdgeInsets.all(8.0),
            child: TextFormField(
              controller: nama,
              decoration: InputDecoration(
                labelText: 'Nama Lengkap',
              ),
              validator: (value) {
                if (value.isEmpty) {
                  return 'Nama tidak boleh kosong';
                }
                return null;
              },
            ),
          ),
          Padding(
            padding: const EdgeInsets.all(8.0),
            child: new RadioListTile(
              value: "L",
              title: new Text("Laki-laki"),
              groupValue: _jk,
              onChanged: (String value){
                _pilihJk(value);
              },
              activeColor: Colors.blue,
              subtitle: new Text("Pilih salah satu"),
            ),
          ),
          Padding(
          padding: const EdgeInsets.all(8.0),
          child: new RadioListTile(
            value: "P",
            title: new Text("Perempuan"),
            groupValue: _jk,
            onChanged: (String value){
              _pilihJk(value);
            },
            activeColor: Colors.blue,
            subtitle: new Text("Pilih salah satu"),
             ),
          ),
          Padding(
            padding: const EdgeInsets.all(8.0),
            child: TextFormField(
              controller: email,
              decoration: InputDecoration(
                labelText: 'Email',
              ),
              validator: (value) {
                if (value.isEmpty) {
                  return 'Email tidak boleh kosong';
                }
                return null;
              },
            ),
          ),

          Padding(
            padding: const EdgeInsets.all(8.0),
            child: TextFormField(
              controller: telp,
              keyboardType: TextInputType.number,
              decoration: InputDecoration(
                labelText: 'Phone',
              ),
              validator: (value) {
                if (value.isEmpty) {
                  return 'Phone tidak boleh kosong';
                }
                return null;
              },
            ),
          ),



         /* Padding(
            padding: const EdgeInsets.all(8.0),
            child: TextField(
              controller: tahun,
              decoration: InputDecoration(
                labelText: 'Tahun Masuk',
              ),
            ),-
          ),*/

          Padding(padding: EdgeInsets.all(8),
            child: RaisedButton(
              onPressed: (){
                setState(() {
                  addUpdateData();
                });
                Navigator.push(context, MaterialPageRoute(builder: (context) => DataDiriDosen(),),);
                debugPrint('Clicked RaisedButton Button');
              },
              color: Colors.blue,
              child: Text(editMode ? 'Update' :'Save',style: TextStyle(color: Colors.white),),
            ),
          ),
        ],
      ),
    );
  }
}
