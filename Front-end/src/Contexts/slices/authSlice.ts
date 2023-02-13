import { createSlice, PayloadAction } from "@reduxjs/toolkit";

export interface IUserState {
  current: {
    isLogIn: boolean;
    token?: string;
    avatar?: string;
    type?: "google" | "email" | "facebook";
  };
  error?: any;
}

const initialState: IUserState = {
  current: { isLogIn: false },
};

export const AuthSlice = createSlice({
  name: "products",
  initialState,
  reducers: {
    logIn: (
      state,
      action: PayloadAction<{
        token: string;
        avatar: string;
        type: "google" | "email" | "facebook";
      }>
    ) => {
      state.current.isLogIn = true;
      state.current.token = action.payload.token;
      state.current.avatar = action.payload.avatar;
      state.current.type = action.payload.type;
    },

    logOut: (state) => {
      state.current.isLogIn = false;
      state.current.token = undefined;
      state.current.avatar = undefined;
      state.current.type = undefined;
    },
  },
});

export const { logIn, logOut } = AuthSlice.actions;

export default AuthSlice.reducer;
