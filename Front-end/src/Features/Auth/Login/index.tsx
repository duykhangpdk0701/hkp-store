import { useMutation, useQuery } from "@tanstack/react-query";
import { Button, notification } from "antd";
import React, { useState } from "react";
import { ReactFacebookLoginInfo } from "react-facebook-login";
import { GoogleLoginResponse } from "react-google-login";
import { useNavigate } from "react-router-dom";
import authApi from "../../../Api/authAPI";
import { logIn } from "../../../Contexts/slices/authSlice";
import { useAppDispatch } from "../../../Hooks/redux";
import LoginForm from "../Components/LoginForm";

export interface ILoginParams {
  email: string;
  password: string;
}

interface ILoginSocial {
  email: string;
  id: string;
  name: string;
  token: string;
  avatar?: string;
}

const Login = () => {
  const navigate = useNavigate();
  const [loading, setLoading] = useState(false);
  const [alertText, setAlertText] = useState(null);
  const dispatch = useAppDispatch();

  const googleAuthMutation = useMutation({
    mutationKey: ["googleAuth"],
    mutationFn: ({ email, id, name, token, avatar }: ILoginSocial) =>
      authApi.loginWithGoogle(email, id, name, token, avatar),
    onSuccess: (data) => {
      dispatch(
        logIn({ token: data.token, avatar: data.avatar, type: "google" })
      );
      navigate(-1);
      setLoading(false);
    },
    onError: (error: any) => {
      notification.error({
        message: "Error",
        description: `error ${error.message} please try again`,
        placement: "bottomLeft",
      });
      setLoading(false);
    },
  });

  const facebookAuthMutation = useMutation({
    mutationKey: ["facebookAuth"],
    mutationFn: ({ email, id, name, token, avatar }: ILoginSocial) =>
      authApi.loginWithFacebook(email, id, name, token, avatar),
    onSuccess: (data) => {
      dispatch(
        logIn({ token: data.token, avatar: data.avatar, type: "facebook" })
      );
      navigate("/");
      setLoading(false);
    },
    onError: (error: any) => {
      notification.error({
        message: "Error",
        description: `error ${error.message} please try again`,
        placement: "bottomLeft",
      });
      setLoading(false);
    },
  });

  const responseGoogle = async (response: GoogleLoginResponse) => {
    setLoading(true);
    const resProfile = response.getBasicProfile();
    const resData = {
      id: response.getId(),
      email: resProfile.getEmail(),
      name: resProfile.getName(),
      token: response.tokenId,
      avatar: resProfile.getImageUrl(),
    };
    await googleAuthMutation.mutateAsync({ ...resData });
    setLoading(false);
  };

  const responseFacebook = async (response: ReactFacebookLoginInfo) => {
    setLoading(true);
    const resData = {
      id: response.id,
      email: response.email as string,
      name: response.name as string,
      token: response.accessToken,
      avatar: response.picture?.data.url as string,
    };
    await facebookAuthMutation.mutateAsync({ ...resData });
    setLoading(false);
  };

  const onFinish = async (values: ILoginParams) => {
    try {
      setLoading(true);
      setAlertText(null);
      const { email, password } = values;
      const res = await authApi.login(email, password);
      dispatch(logIn({ token: res.token, avatar: res.avatar, type: "email" }));

      navigate("/");
      setLoading(false);
    } catch (error: any) {
      setLoading(false);
      setAlertText(error.message);
    }
  };

  return (
    <LoginForm
      alertText={alertText}
      onFinish={onFinish}
      loading={loading}
      responseGoogle={responseGoogle}
      responseFacebook={responseFacebook}
    />
  );
};

export default Login;
