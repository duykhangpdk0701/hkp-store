import { store } from "../Contexts/store";
import { useAppSelector } from "../Hooks/redux";

export const getUserToken = () => {
  const authState = store.getState().auth.current;
  const token = authState.token;
  return token;
};
