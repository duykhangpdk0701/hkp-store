import React, { FC } from "react";

interface IDisplayValuePayment {
  data?: string;
}

const DisplayValuePayment: FC<IDisplayValuePayment> = (props) => {
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
    </div>
  );
};

export default DisplayValuePayment;
