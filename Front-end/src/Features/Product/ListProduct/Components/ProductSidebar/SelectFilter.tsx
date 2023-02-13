import { Button, Checkbox, Skeleton, Space } from "antd";
import { CheckboxValueType } from "antd/lib/checkbox/Group";
import React, { FC, useState } from "react";

interface ICheckBoxFilter {
  options?: {
    label: string;
    value: number;
    amount: number | string;
  }[];
  onChange?: any;
  isLoading?: boolean;
  label?: string;
}

const CheckBoxFilterLoading = () => {
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

const CheckBoxFilter: FC<ICheckBoxFilter> = (props) => {
  const { options, onChange, isLoading, label } = props;
  const [selected, setSelected] = useState<CheckboxValueType[]>([]);

  const handleOnChange = (e: CheckboxValueType[]) => {
    const value = e;
    setSelected(value);
    if (onChange) {
      onChange(value);
    }
  };

  const handleClearBtn = (e: React.MouseEvent<HTMLElement, MouseEvent>) => {
    setSelected([]);
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
      <Checkbox.Group className="w-full" onChange={handleOnChange}>
        <Space direction="vertical" className="w-full">
          {isLoading ? (
            CheckBoxFilterLoading()
          ) : (
            <>
              {options?.map((item) => {
                return (
                  <Checkbox
                    className="radio w-full"
                    key={item.value}
                    value={item.value}
                  >
                    {selected.includes(item.value) ? (
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
                  </Checkbox>
                );
              })}
            </>
          )}
        </Space>
      </Checkbox.Group>
    </>
  );
};

export default CheckBoxFilter;
