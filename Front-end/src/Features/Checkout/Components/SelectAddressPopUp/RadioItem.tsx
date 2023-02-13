import { Divider, Tag } from "antd";
import React, { FC } from "react";
import IAddress from "../../../../Interfaces/Address";

interface IRadioItem {
  data: IAddress;
  isDefault: boolean;
}

const RadioItem: FC<IRadioItem> = (props) => {
  const { data, isDefault } = props;
  return (
    <div className="py-5">
      <div className="flex justify-start mb-1">
        <div>
          <span className="text-base font-medium">{data.name}</span>
        </div>
      </div>

      <div>
        <div className="flex justify-start mb-1">
          <div>
            <div>
              <span className="text-sm text-slate-500 font-light">
                {data.address}
              </span>
            </div>
            <div>
              <span className="text-sm text-slate-500 font-light">
                {data.parse_address_string}
              </span>
            </div>
          </div>
        </div>

        <div className="flex justify-start mb-1">
          <div>{isDefault && <Tag color="red">Default</Tag>}</div>
        </div>
      </div>
    </div>
  );
};

export default RadioItem;
