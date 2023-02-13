import IUser from "../Interfaces/User";
import Login from "../Model/Login";
import axiosClient from "./axiosClient";

const authApi = {
  login: async (email: string, password: string): Promise<Login> => {
    const url = "/api/auth/login";
    const res = await axiosClient.post(url, { email, password });
    return res.data;
  },

  loginWithGoogle: async (
    email: string,
    id: string,
    name: string,
    token: string,
    avatar?: string
  ) => {
    const url = `/api/auth/oauth/google/callback`;
    const reqData = { email, id, name, token, avatar };
    const res = await axiosClient.post(url, reqData);
    return res.data;
  },

  loginWithFacebook: async (
    email: string,
    id: string,
    name: string,
    token: string,
    avatar?: string
  ) => {
    const url = `/api/auth/oauth/facebook/callback`;
    const reqData = { email, id, name, token, avatar };
    const res = await axiosClient.post(url, reqData);
    return res.data;
  },

  logout: async (): Promise<void> => {
    const url = "/api/auth/logout";
    const res = await axiosClient.post(url);
    return res.data;
  },

  register: async (
    firstName: string,
    lastName: string,
    email: string,
    password: string,
    agreeCkb: string,
    passwordConfirmation: string
  ): Promise<any> => {
    const url = "/api/auth/register";
    const reqSchema = {
      first_name: firstName,
      last_name: lastName,
      email: email,
      password: password,
      agree_ckb: agreeCkb,
      password_confirmation: passwordConfirmation,
    };
    const res = await axiosClient.post(url, reqSchema);
    return res;
  },

  getUserDetail: async (): Promise<IUser> => {
    const url = "/api/auth/user";
    const res = await axiosClient.get(url);
    return res.data;
  },
};

export default authApi;
