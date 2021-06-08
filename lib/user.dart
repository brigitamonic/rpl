import 'package:flutter/material.dart';
import 'package:rpl_app/main.dart';
import 'package:rpl_app/user/Data%20Diri.dart';
import 'package:rpl_app/user/PengajuanMhs.dart';

class User extends StatefulWidget {
  final String email;

  User({this.email});
  @override
  _UserState createState() => _UserState();
}
class MyApp extends StatelessWidget {
  // This widget is the root of your application.
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      title: '',
      theme: ThemeData(
      ),
      home: User(),
    );
  }
}
class _UserState extends State<User> {
  @override
  Widget build(BuildContext context) {


    return Scaffold(
      appBar: AppBar(
        title: Text("Sistem Informasi Akademik"),
      ),



      drawer: Drawer(
        child: ListView(
          children: <Widget>[
            UserAccountsDrawerHeader(
              accountEmail: Text(widget.email),
              decoration: BoxDecoration(
                color: Color(0xFF0D47A1),
              ),
              currentAccountPicture: CircleAvatar(
                backgroundColor: Colors.cyanAccent,
              ),
            ),
            ListTile(
              title: Text(
                "Data Diri",
                style: TextStyle(
                  color: Color(0xFF0D47A1),
                ),
              ),
              onTap: (){
                Navigator.pop(context);
                    Navigator.push(context, MaterialPageRoute(builder: (context) => DataDiri(),),);
              },
              trailing: Icon(
                Icons.people,
                color: Color(0xFF0D47A1),
              ),
              subtitle: Text(
                "Data mahasiswa",
                style: TextStyle(
                  color: Colors.grey,
                ),
              ),
            ),
            ListTile(
              title: Text(
                "Pengajuan Kp",
                style: TextStyle(
                  color: Color(0xFF0D47A1),
                ),
              ),
              trailing: Icon(
                Icons.people_alt_outlined,
                color: Color(0xFF0D47A1),
              ),
              subtitle: Text(
                "Mengajuakan Form",
                style: TextStyle(
                  color: Colors.grey,
                ),
              ),
              onTap: (){
                Navigator.pop(context);
                Navigator.push(context, MaterialPageRoute(builder: (context) => AddEditPagePengajuanMhs(),),);
              },
            ),

            Divider(
              color: Colors.grey,
              height: 20,
              indent: 10,
              endIndent: 10,
            ),
            ListTile(
              title: Text(
                "Logout",
                style: TextStyle(
                  color: Color(0xFF0D47A1),
                ),
              ),
              trailing: Icon(
                Icons.exit_to_app,
                color: Color(0xFF0D47A1),
              ),
              onTap: () async{
                Navigator.pushReplacement(
                  context,
                  MaterialPageRoute(builder: (context) => Login()),
                );
              },
            ),
            Positioned(
              child: Container(
                decoration: BoxDecoration(
                    image: DecorationImage(
                        image: AssetImage('image/tree1.png'),
                        fit: BoxFit.fill
                    )
                ),
              ),
            )
          ],

        ),
      ),
      body: Stack(
        children: <Widget>[
          Container(
            decoration: BoxDecoration(
                image: DecorationImage(
                    alignment: Alignment.topCenter,
                    image: AssetImage('image/tree.png')
                )
            ),
          ),
          Expanded(child:
          GridView.count(
            mainAxisSpacing: 10,
            crossAxisCount: 2,
            primary: false,
            crossAxisSpacing: 10 ,
            children: <Widget>[
              Card(
                  shape: RoundedRectangleBorder(
                      borderRadius: BorderRadius.circular(70)
                  ),
                  elevation: 4,
                  child: Column(
                    mainAxisAlignment: MainAxisAlignment.center,
                    children: <Widget>[
                      new Container(
                        width: 130.0,
                        height: 130.0,
                        decoration: new BoxDecoration(
                          shape: BoxShape.circle,
                          image: new DecorationImage(
                              fit: BoxFit.fill,
                              image: new AssetImage('image/mahasiswa.png')
                          ),
                        ),
                      ),
                      FlatButton(onPressed: ()async {
                        Navigator.pushReplacement(
                          context,
                          MaterialPageRoute(),//builder: (context) => DashboardMahasiswa(title: "Data Mahasiswa",)),
                        );},
                          child: Text("Data Mahasiswa")),
                    ],
                  )
              ),
              Card(
                  shape: RoundedRectangleBorder(
                      borderRadius: BorderRadius.circular(70)
                  ),
                  elevation: 4,
                  child: Column(
                    mainAxisAlignment: MainAxisAlignment.center,
                    children: <Widget>[
                      new Container(
                        width: 130.0,
                        height: 130.0,
                        decoration: new BoxDecoration(
                          shape: BoxShape.circle,
                          image: new DecorationImage(
                              fit: BoxFit.fill,
                              image: new AssetImage('image/jadwal.png')
                          ),
                        ),
                      ),
                      FlatButton(onPressed: ()async {
                        Navigator.pushReplacement(
                          context,
                          MaterialPageRoute(),//builder: (context) => Dashboard_dosen(title: "Data Dosen",)),
                        );},
                          child: Text("Jadwal")),

                    ],
                  )
              ),
              SizedBox(width: 15,),
            ],
          ),
          ),
        ],
      ),
    );
  }
}