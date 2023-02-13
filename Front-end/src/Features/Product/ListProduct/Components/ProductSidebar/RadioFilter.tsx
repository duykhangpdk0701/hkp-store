import React, { FC, useState } from "react";
import { Button, Form, Radio, RadioChangeEvent, Skeleton, Space } from "antd";

import "./RadioFilter.scss";

interface IRadio {
  options?: {
    label: string;
    value: number;
    amount: number | string;
  }[];
  onChange?: any;
  isLoading?: boolean;
  label?: string;
}

const RadioFilterLoading = () => {
  return (
    <>
      <div className="flex justify-between">
        <Skeleton.Button active={true} />
        <Skeleton.Avatar active={true} shape="circle" />
      </div>
      <div className="flex justify-between">
        <Skeleton.Button active={true} />
        <Skeleton.Avatar active={true} shape="circle" />
      </div>
      <div className="flex justify-between">
        <Skeleton.Button active={true} />
        <Skeleton.Avatar active={true} shape="circle" />
      </div>
      <div className="flex justify-between">
        <Skeleton.Button active={true} />
        <Skeleton.Avatar active={true} shape="circle" />
      </div>
    </>
  );
};

const RadioFilter: FC<IRadio> = (props) => {
  const { options, onChange, isLoading, label } = props;
  const [selected, setSelected] = useState(null);

  const handleOnChange = (e: RadioChangeEvent) => {
    console.log(e.target.value);
    const value = e.target.value;
    setSelected(value);
    if (onChange) {
      onChange(value);
    }
  };

  const handleClearBtn = (e: React.MouseEvent<HTMLElement, MouseEvent>) => {
    setSelected(null);
    if (onChange) {
      onChange(undefined);
    }
  };

  return (
    <>
      <div className="flex justify-between w-full">
        <h2>{label}</h2>

        {selected ? (
          <Button
            className="text-blue-600"
            onClick={handleClearBtn}
            type="text"
          >
            Clear all
          </Button>
        ) : null}
      </div>
      <Radio.Group className="w-full" onChange={handleOnChange}>
        <Space direction="vertical" className="w-full">
          {isLoading ? (
            RadioFilterLoading()
          ) : (
            <>
              {options?.map((item) => {
                return (
                  <Radio
                    className="radio w-full"
                    key={item.value}
                    value={item.value}
                  >
                    {selected === item.value ? (
                      <>
                        <div className="text-orange-500">{item.label}</div>
                        <div className="bg-orange-500 py-1 px-2 rounded-full text-white h-7 w-7 flex justify-center items-center">
                          <span>{item.amount}</span>
                        </div>
                      </>
                    ) : (
                      <>
                        <div>{item.label}</div>
                        <div className="bg-gray-200 py-1 px-2 rounded-full text-gray-400 h-7 w-7 flex justify-center items-center">
                          <span>{item.amount}</span>
                        </div>
                      </>
                    )}
                  </Radio>
                );
              })}
            </>
          )}
        </Space>
      </Radio.Group>
    </>
  );
};

export default RadioFilter;
