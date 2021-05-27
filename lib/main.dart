import 'dart:io';

import 'package:flutter/material.dart';
import 'dart:convert';
import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'package:rpl_app/dosen.dart';
import 'package:rpl_app/koor.dart';
import 'package:rpl_app/user.dart';
import 'package:rpl_app/already_have_an_account_acheck.dart';
import 'package:rpl_app/register.dart';
void main() {
  runApp(MyApp());
}

class MyApp extends StatelessWidget {
  // This widget is the root of your application.
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: 'RPL',
      theme: ThemeData(
    ),
    home: Login(),
    );
  }
}

class Login extends StatefulWidget {
  @override
  _LoginState createState() => _LoginState();
}

class _LoginState extends State<Login> {

  String email, password, status;

  String alert = "Ready for Login";

  final GlobalKey<FormState> _formKey = GlobalKey<FormState>();
  TextEditingController emailInput = new TextEditingController();
  TextEditingController passwordInput = new TextEditingController();

  void loginProcess() async {
    if (_formKey.currentState.validate()) {

      final response = await http.post(Uri.parse("http://192.168.43.47/rpl/login.php")
          , body: {
        "email": emailInput.text,
        "password": passwordInput.text
      });

      var dataUser = json.decode(response.body);

      if (dataUser.length < 1) {
        // if data user is empty or 0
        setState(() {
          alert = "You can't login";
        });
      } else {
        setState(() {
          email = dataUser[0]["email"];
          password = dataUser[0]["password"];
          status = dataUser[0]["status"];
        });
        if(status == "Koor"){
          Navigator.pushReplacement(context,
              MaterialPageRoute(builder: (context) => Koor(email: email,))
          );
        }else if(status == "mahasiswa")
        Navigator.pushReplacement(context,
            MaterialPageRoute(builder: (context) => User(email: email,))
        );
        else{
          Navigator.pushReplacement(context,
              MaterialPageRoute(builder: (context) => Dosen(email: email,))
          );
        }
      }
    }
  }

        @override
        Widget build(BuildContext context) {
          return Scaffold(
            backgroundColor: Colors.white,
            body: SingleChildScrollView(
              child: Column(
                crossAxisAlignment: CrossAxisAlignment.start,
                children: <Widget>[
                  Container(
              decoration: BoxDecoration(
                  image: DecorationImage(
                  image: AssetImage('image/background.png'),
                fit: BoxFit.fill
            )
          ),
                    height: 320,
                    width: 500,
                    child: Stack(
                      children: <Widget>[

                        Positioned(
                          bottom: -10,
                          right : 20,
                          height: 105,
                          width: 110,
                          child: Container(
                            decoration: BoxDecoration(
                                image: DecorationImage(
                                    image: AssetImage('image/tree.png'),
                                    fit: BoxFit.fill
                                )
                            ),
                          ),
                        ),
                        Positioned(
                          height: 360,
                          width: 500,
                          child: Container(
                            decoration: BoxDecoration(
                                image: DecorationImage(
                                    image: AssetImage('image/background-2.png'),
                                    fit: BoxFit.fill
                                )
                            ),
                          ),
                        )
                      ],
                    ),
                  ),

                      SizedBox(height: 60,),
                      Form(
                        key: _formKey,
                        child: Column(
                          children: <Widget>[
                            TextFormField(
                              controller: emailInput,
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
                              controller: passwordInput,
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
                                      return Register();
                                    },
                                  ),
                                );
                              },
                            ),
                            Card(
                              color: Colors.black87,
                              elevation: 5,
                              child: Container(
                                height: 50,
                                child: InkWell(
                                  splashColor: Colors.white,
                                  onTap: () {
                                    loginProcess();
                                  },
                                  child: Center(
                                    child: Text(
                                      "Login",
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
                  )
              ),
            );

        }

      }
class MyHttpOverrides extends HttpOverrides {
  @override
  HttpClient createHttpClient(SecurityContext context) {
    return super.createHttpClient(context)
      ..badCertificateCallback =
      (X509Certificate cert, String host, int port) => true;
  }
}
