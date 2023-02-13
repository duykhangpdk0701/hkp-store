import { Drawer } from "antd";
import React, { FC, ReactNode } from "react";

interface IProductDrawer {
  productSideBar: ReactNode;
  open: boolean;
  onClose: () => void;
}

const ProductDrawer: FC<IProductDrawer> = (props) => {
  const { productSideBar, open, onClose } = props;

  return (
    <Drawer placement="right" open={open} onClose={onClose}>
      {productSideBar}
    </Drawer>
  );
};

export default ProductDrawer;
