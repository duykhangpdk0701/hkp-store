import { Button, Form, Input } from "antd";
import React, { ChangeEvent, FC, useState } from "react";

interface IAddPromoCode {
  onChange?: (value: string) => void;
}

const AddPromoCode: FC<IAddPromoCode> = (props) => {
  const { onChange } = props;
  const [toggle, setToggle] = useState(false);

  const handleButton = () => {
    setToggle(true);
  };

  const handleOnChange = (e: ChangeEvent<HTMLInputElement>) => {
    if (onChange) {
      onChange(e.target.value);
    }
  };

  return (
    <Form.Item>
      {toggle ? (
        <div>
          <Input onChange={handleOnChange} className="w-32" placeholder="Add" />
          <Button type="text">Apply</Button>
        </div>
      ) : (
        <Button className="ml-2" type="text" onClick={handleButton}>
          Add a promo code
        </Button>
      )}
    </Form.Item>
  );
};

export default AddPromoCode;
