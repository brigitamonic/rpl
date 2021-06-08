import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'package:rpl_app/main.dart';
import 'dart:convert';
import 'package:rpl_app/user.dart';

import 'package:rpl_app/user/Data%20Diri.dart';
import 'package:flutter/services.dart';

import 'Data DiriPengajuan.dart';

class AddEditPagePengajuank extends StatefulWidget {
  final List list;
  final int index;
  AddEditPagePengajuank({this.list,this.index});
  @override
  _AddEditPagePengajuank createState() => _AddEditPagePengajuank();
}

class _AddEditPagePengajuank extends State<AddEditPagePengajuank> {


  var _formKey =  GlobalKey<FormState>();
  TextEditingController dosen = TextEditingController();
  TextEditingController mhs = TextEditingController();
  TextEditingController smt = TextEditingController();
  TextEditingController thn_pengajuan = TextEditingController();
  TextEditingController lemb = TextEditingController();
  TextEditingController p_lemb = TextEditingController();
  TextEditingController surat = TextEditingController();
  TextEditingController status = TextEditingController(text: "diterima" "Tidak");

  bool editMode = false;




  addUpdateData(){
    if(editMode){
      http.post(Uri.parse("http://192.168.43.47/rpl/pengajuan.php"),body: {
        'dosen' : dosen.text,
        'mhs' : mhs.text,
        'smt' : smt.text,
        'thn_pengajuan' : thn_pengajuan.text,
        'lemb' : lemb.text,
        'p_lemb' : p_lemb.text,
        'surat' : surat.text,
        'status' : status.text,

      });

    }else{
      http.post(Uri.parse("http://192.168.43.47/rpl/pengajuan.php"),body: {
        'dosen' : dosen.text,
        'mhs' : mhs.text,
        'smt' : smt.text,
        'thn_pengajuan' : thn_pengajuan.text,
        'lemb' : lemb.text,
        'p_lemb' : p_lemb.text,
        'surat' : surat.text,
        'status' : status.text,
      });

    }

  }


  @override
  void initState() {
    super.initState();
    if(widget.index != null){
      editMode = true;
      dosen.text = widget.list[widget.index]['dosen'];
      mhs.text = widget.list[widget.index]['mhs'];
      smt.text = widget.list[widget.index]['smt'];
      lemb.text = widget.list[widget.index]['lemb'];
      p_lemb.text = widget.list[widget.index]['p_lemb'];
      surat.text = widget.list[widget.index]['surat'];
      status.text = widget.list[widget.index]['status'];
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
              controller: dosen,
              decoration: InputDecoration(
                labelText: 'Nama Dosen',
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
            child: TextFormField(
              controller: mhs,

              decoration: InputDecoration(
                labelText: 'mahasiswa',
              ),
              validator: (value) {
                if (value.isEmpty) {
                  return 'Phone tidak boleh kosong';
                }
                return null;
              },
            ),
          ),
          Padding(
            padding: const EdgeInsets.all(8.0),
            child: TextFormField(
              controller: smt,
              keyboardType: TextInputType.number,
              decoration: InputDecoration(
                labelText: 'Semester',
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
            child: TextFormField(
              controller: thn_pengajuan,
              keyboardType: TextInputType.number,
              decoration: InputDecoration(
                labelText: 'Tahun Pengajuan',
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
            child: TextFormField(
              controller: lemb,
              decoration: InputDecoration(
                labelText: 'Lembaga',
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
            child: TextFormField(
              controller: p_lemb,
              decoration: InputDecoration(
                labelText: 'Pemimpin Perusahaan',
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
            child: TextFormField(
              controller: surat,
              decoration: InputDecoration(
                labelText: 'Surat',
              ),
              validator: (value) {
                if (value.isEmpty) {
                  return 'Phone tidak boleh kosong';
                }
                return null;
              },
            ),
          ),
          Padding(
            padding: const EdgeInsets.all(8.0),
            child: TextFormField(
              controller: status,
              keyboardType: TextInputType.number,
              decoration: InputDecoration(
                labelText: 'Status',
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
                Navigator.push(context, MaterialPageRoute(builder: (context) => DataDiriPengajuan(),),);
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
