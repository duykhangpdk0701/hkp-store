import { createSlice, PayloadAction } from "@reduxjs/toolkit";

export interface ICartState {
  localCartId: number | null;
  userCartId: number | null;
  error?: any;
}

const initialState: ICartState = {
  localCartId: null,
  userCartId: null,
};

export const CartSlice = createSlice({
  name: "cart",
  initialState,
  reducers: {
    setLocalCartId: (state, action: PayloadAction<{ cartId: number }>) => {
      state.localCartId = action.payload.cartId;
    },
    setUserCartId: (state, action: PayloadAction<{ cartId: number }>) => {
      state.userCartId = action.payload.cartId;
    },
  },
});

export const { setLocalCartId, setUserCartId } = CartSlice.actions;

export default CartSlice.reducer;
