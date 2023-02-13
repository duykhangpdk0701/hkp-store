import { SmileOutlined } from "@ant-design/icons";
import { notification } from "antd";
import React, { useState } from "react";
import { useNavigate } from "react-router-dom";
import authApi from "../../../Api/authAPI";
import IRegister from "../../../Interfaces/Register";
import RegisterForm from "../Components/RegisterForm";

const Register = () => {
  const navigate = useNavigate();
  const [loading, setLoading] = useState(false);
  const [alertText, setAlertText] = useState(null);

  const onFinish = async (values: IRegister) => {
    try {
      setLoading(true);
      setAlertText(null);
      const {
        firstName,
        lastName,
        email,
        password,
        agreeCkb,
        passwordConfirmation,
      } = values;
      await authApi.register(
        firstName,
        lastName,
        email,
        password,
        agreeCkb,
        passwordConfirmation
      );

      navigate("/auth/login");

      setLoading(false);
      notification.open({
        message: "Register successfully",
        description: "Now use can use your account to login",
        placement: "bottomLeft",
        icon: <SmileOutlined style={{ color: "#108ee9" }} />,
      });
    } catch (error: any) {
      console.log(error);
      setLoading(false);
      setAlertText(error.message);
    }
  };

  return (
    <RegisterForm alertText={alertText} onFinish={onFinish} loading={loading} />
  );
};

export default Register;
