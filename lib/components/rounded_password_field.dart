import 'package:flutter/material.dart';
import 'package:rpl_app/components/text_field_container.dart';
import 'package:rpl_app/constants.dart';
import 'package:rpl_app/register.dart';

class RoundedPasswordField extends StatelessWidget {
  final ValueChanged<String> onChanged;
  const RoundedPasswordField({
    Key key,
    this.onChanged,
  }) : super(key: key);

  @override
  Widget build(BuildContext context) {
    key:
    return TextFieldContainer(
      child: TextFormField(
        obscureText: true,
        onChanged: onChanged,
        cursorColor: kPrimaryColor,
        decoration: InputDecoration(
          hintText: "Password",
          icon: Icon(
            Icons.lock,
            color: kPrimaryColor,
          ),
          border: InputBorder.none,
        ),
        validator: (String value) {
          if (value.isEmpty) {
            return "Password is empty";
          }

          return null;
        },
      ),
    );
  }
}

