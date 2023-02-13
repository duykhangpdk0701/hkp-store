import { Select } from "antd";
import React, { FC, useState } from "react";

interface IAddressOptionList {
  value?: string;
  listData?: any[];
  onChange?: (values: any) => void;
  onChangeTermValue?: (values: any) => void;
  placeholder?: string;
  className?: string;
  disable?: boolean;
  isLoading?: boolean;
}

const AddressOptionListAdd: FC<IAddressOptionList> = (props) => {
  const {
    value,
    listData,
    placeholder,
    className,
    onChange,
    disable,
    onChangeTermValue,
    isLoading,
  } = props;

  const handleOnChange = (values: string) => {
    const newValue = parseInt(values);
    if (onChangeTermValue) {
      onChangeTermValue(newValue);
    }

    if (onChange) {
      onChange(newValue);
    }
  };

  return (
    <Select
      disabled={disable}
      value={value}
      onChange={handleOnChange}
      showSearch
      className={className}
      placeholder={placeholder}
      loading={isLoading}
      filterOption={(input, option) =>
        (option?.label ?? "").toLowerCase().includes(input.toLowerCase())
      }
      options={listData?.map((item) => ({
        value: item.id,
        label: item.name,
      }))}
    />
  );
};

export default AddressOptionListAdd;
