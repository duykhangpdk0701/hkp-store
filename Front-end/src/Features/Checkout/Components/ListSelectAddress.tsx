import { Radio, RadioChangeEvent } from "antd";
import React, { FC, useState } from "react";

interface IListSelectAddress {
  onChange?: (value: any) => void;
}

const ListSelectAddress: FC<IListSelectAddress> = (props) => {
  const { onChange } = props;
  const [selected, setSelected] = useState(null);

  const handleOnChange = (e: RadioChangeEvent) => {
    const value = e.target.value;
    setSelected(value);
    if (onChange) {
      onChange(value);
    }
  };

  return (
    <Radio.Group className="w-full" onChange={handleOnChange}></Radio.Group>
  );
};

export default ListSelectAddress;
