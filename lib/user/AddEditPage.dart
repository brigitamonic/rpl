import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'package:rpl_app/main.dart';
import 'dart:convert';
import 'package:rpl_app/user.dart';

import 'package:rpl_app/user/Data%20Diri.dart';
import 'package:flutter/services.dart';

class AddEditPage extends StatefulWidget {
  final List list;
  final int index;
  AddEditPage({this.list,this.index});
  @override
  _AddEditPageState createState() => _AddEditPageState();
}

class _AddEditPageState extends State<AddEditPage> {
  String _jk="";

  var _formKey =  GlobalKey<FormState>();
  TextEditingController nim = TextEditingController();
  TextEditingController nama = TextEditingController();
  TextEditingController jk = TextEditingController();
  TextEditingController telp = TextEditingController();
  TextEditingController tahun = TextEditingController();
  bool editMode = false;


  void _pilihJk(String value) {
    setState(() {
      _jk = value;
    });
  }

  addUpdateData(){
    if(editMode){
      http.post(Uri.parse("http://192.168.43.47/rpl/edit.php"),body: {
        'nim' : nim.text,
        'nm_mhs' : nama.text,
        'jk' : jk.text,
        'telp_mhs' : telp.text,
        'thn_msk' : tahun.text,

      });

    }else{
      http.post(Uri.parse("http://192.168.43.47/rpl/add.php"),body: {
        'nim' : nim.text,
        'nm_mhs' : nama.text,
        'jk' : jk.text,
        'telp_mhs' : telp.text,
        'thn_msk' : tahun.text,
      });

    }

  }


  @override
  void initState() {
    super.initState();
    if(widget.index != null){
      editMode = true;
      nim.text = widget.list[widget.index]['nim'];
      nama.text = widget.list[widget.index]['nm_mhs'];
      jk.text = widget.list[widget.index]['jk'];
      telp.text = widget.list[widget.index]['telp_mhs'];
      tahun.text = widget.list[widget.index]['thn_msk'];
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
              controller: nim,
              keyboardType: TextInputType.number,
              decoration: InputDecoration(
                labelText: 'Nim',
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
                  if(_formKey.currentState.validate()){
                    this.editMode;
                  }
                  addUpdateData();
                });
                Navigator.push(context, MaterialPageRoute(builder: (context) => DataDiri(),),);
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
