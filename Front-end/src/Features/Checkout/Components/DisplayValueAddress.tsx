import React, { FC } from "react";

interface IDisplayValueAddress {
  data?: string;
}

const DisplayValueAddress: FC<IDisplayValueAddress> = (props) => {
  const data = props.data ? JSON.parse(props.data) : null;

  if (!data) {
    return <div></div>;
  }

  return (
    <div className="p-4">
      <div className="flex justify-start mb-1">
        <div>
          <span className="text-base font-medium">{data?.name}</span>
        </div>
      </div>
      <div className="flex justify-start mb-1">
        <div>
          <div>
            <span className="text-sm text-slate-500 font-light">
              {data?.address}
            </span>
          </div>
          <div>
            <span className="text-sm text-slate-500 font-light">
              {data?.parse_address_string}
            </span>
          </div>
        </div>
      </div>
    </div>
  );
};

export default DisplayValueAddress;
