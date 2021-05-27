import 'dart:convert';
import 'package:flutter_svg/svg.dart';
import 'package:fluttertoast/fluttertoast.dart';
import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'already_have_an_account_acheck.dart';
import 'main.dart';

class Register extends StatefulWidget {
  @override
  _RegisterState createState() => _RegisterState();
}

class _RegisterState extends State<Register> {
  final GlobalKey<FormState> _formKey = GlobalKey<FormState>();
  TextEditingController emails = TextEditingController();
  TextEditingController password = TextEditingController();
  TextEditingController stat = TextEditingController();

  TextEditingController nameController = TextEditingController();
  bool processing = false;
  void _handleRadioValueChange( value) {
    setState(() {
      stat = value;

      switch (value) {
        case 0:
          break;
        case 1:
          break;
        case 2:
          break;
      }
    });
  }

  void register() async {

    setState(() {
      processing = true;
    });
    final result = await http.post(Uri.parse("http://192.168.43.47/rpl/registrasi.php")
        , body: {
      "email": emails.text,
      "password": password.text,
      "status": stat.text,
    });
    if(jsonDecode(result.body.toString()) == "account already exists"){
      Fluttertoast.showToast(msg: "account exists, Please login",toastLength: Toast.LENGTH_SHORT);

    }else{

      if(jsonDecode(result.body.toString()) == "true"){
        Fluttertoast.showToast(msg: "account created",toastLength: Toast.LENGTH_SHORT);
      }else{
        Fluttertoast.showToast(msg: "error",toastLength: Toast.LENGTH_SHORT);
      }
    }
    setState(() {
      processing = false;
    });
  }


  @override
  Widget build(BuildContext context) {
    Size size = MediaQuery.of(context).size;
    return new Scaffold(
      body: SingleChildScrollView(
        child: Column(
          mainAxisAlignment: MainAxisAlignment.center,
          children: <Widget>[
            Text(
              "SIGNUP",
              style: TextStyle(fontWeight: FontWeight.bold),
            ),
            SizedBox(height: size.height * 0.03),
            SvgPicture.asset(
              "assets/icons/signup.svg",
              height: size.height * 0.35,
            ),

            Form(
              key: _formKey,
              child: Column(
                children: <Widget>[
                  TextFormField(
                    controller: emails,
                    decoration: InputDecoration(
                      border: OutlineInputBorder(),
                      focusedBorder: OutlineInputBorder(
                          borderSide: BorderSide(
                              color: Colors.black87)
                      ),
                      prefixIcon: Icon(Icons.mail, size: 40,),
                      hintText: "Enter your email",
                      hintStyle: TextStyle(color: Colors.black87),
                      labelText: "Email",
                      labelStyle: TextStyle(color: Colors.black87),
                    ),

                    validator: (String value) {
                      if (value.isEmpty) {
                        return "Email is empty";

                      }

                      return null;
                    },
                  ),

                  SizedBox(height: 20,),

                  TextFormField(
                    controller: password,
                    obscureText: true,
                    decoration: InputDecoration(
                      border: OutlineInputBorder(),
                      focusedBorder: OutlineInputBorder(
                          borderSide: BorderSide(
                              color: Colors.black87)
                      ),
                      prefixIcon: Icon(Icons.lock, size: 40,),
                      hintText: "Enter your password",
                      hintStyle: TextStyle(color: Colors.black87),
                      labelText: "Password",
                      labelStyle: TextStyle(color: Colors.black87),
                    ),
                    validator: (String value) {
                      if (value.isEmpty) {
                        return "Password is empty";
                      }
                      return null;
                    },
                  ),
                  SizedBox(height: 20,),
                  AlreadyHaveAnAccountCheck(
                    press: () {
                      Navigator.push(
                        context,
                        MaterialPageRoute(
                          builder: (context) {
                            return Login();
                          },
                        ),
                      );
                    },
                  ),
                  new Row(
                    mainAxisAlignment: MainAxisAlignment.center,
                    children: [
                      new Radio(
                        value: 0,
                        groupValue: stat,
                        onChanged: _handleRadioValueChange,
                      ),
                      new Text(
                        'Mahasiswa',
                        style: new TextStyle(fontSize: 16.0),
                      ),
                      new Radio(
                        value: 1,
                        groupValue: stat,
                        onChanged: _handleRadioValueChange,
                      ),
                      new Text(
                        'Dosen',
                        style: new TextStyle(
                          fontSize: 16.0,
                        ),
                      ),
                      new Radio(
                        value: 2,
                        groupValue: stat,
                        onChanged: _handleRadioValueChange,
                      ),
                      new Text(
                        'Admin',
                        style: new TextStyle(fontSize: 16.0),
                      ),
                    ],
                  ),

                  Card(
                    color: Colors.black87,
                    elevation: 5,
                    child: Container(
                      height: 50,
                      child: InkWell(
                        splashColor: Colors.white,
                        onTap: ()=>register(),
                        child: Center(
                          child: Text(
                            "Singup",
                            style: TextStyle(
                                fontSize: 20, color: Colors.white),
                          ),
                        ),
                      ),
                    ),
                  ),

                ],
              ),
            )
          ],
        ),
      ),
    );
  }
}
