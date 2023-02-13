import { Divider, Skeleton, Space } from "antd";
import React from "react";

const CartLoading = () => {
  return (
    <div>
      <div className="my-10 mx-6 flex">
        <div className="mr-5">
          <Skeleton.Image className="w-20 h-20" />
        </div>
        <div className="basis-full">
          <div>
            <span className="text-base font-semibold mb-2">
              <Skeleton.Input active={true} className="h-6 w-40" />
            </span>
          </div>
          <div className="flex justify-between">
            <div className="flex items-center mb-2">
              <Skeleton.Input active={true} className="h-6 w-40" />
            </div>
            <div className="flex flex-col text-end">
              <Space>
                <Skeleton.Input
                  size="small"
                  active={true}
                  className="h-6 w-40"
                />
                <Skeleton.Input
                  size="small"
                  active={true}
                  className="h-6 w-40"
                />
              </Space>
            </div>
          </div>
          <div className="flex justify-between">
            <div></div>
            <div className="mb-2">
              <Skeleton.Button active={true} />
            </div>
          </div>
        </div>
      </div>
      <Divider />
      <div>
        <div className="my-10 mx-6 flex">
          <div className="mr-5">
            <Skeleton.Image className="w-20 h-20" />
          </div>
          <div className="basis-full">
            <div>
              <span className="text-base font-semibold mb-2">
                <Skeleton.Input active={true} className="h-6 w-40" />
              </span>
            </div>
            <div className="flex justify-between">
              <div className="flex items-center mb-2">
                <Skeleton.Input active={true} className="h-6 w-40" />
              </div>
              <div className="flex flex-col text-end">
                <Space>
                  <Skeleton.Input
                    size="small"
                    active={true}
                    className="h-6 w-40"
                  />
                  <Skeleton.Input
                    size="small"
                    active={true}
                    className="h-6 w-40"
                  />
                </Space>
              </div>
            </div>
            <div className="flex justify-between">
              <div></div>
              <div className="mb-2">
                <Skeleton.Button active={true} />
              </div>
            </div>
          </div>
        </div>
      </div>
      <Divider />
      <div className="my-10 mx-6 flex">
        <div className="mr-5">
          <Skeleton.Image className="w-20 h-20" />
        </div>
        <div className="basis-full">
          <div>
            <span className="text-base font-semibold mb-2">
              <Skeleton.Input active={true} className="h-6 w-40" />
            </span>
          </div>
          <div className="flex justify-between">
            <div className="flex items-center mb-2">
              <Skeleton.Input active={true} className="h-6 w-40" />
            </div>
            <div className="flex flex-col text-end">
              <Space>
                <Skeleton.Input
                  size="small"
                  active={true}
                  className="h-6 w-40"
                />
                <Skeleton.Input
                  size="small"
                  active={true}
                  className="h-6 w-40"
                />
              </Space>
            </div>
          </div>
          <div className="flex justify-between">
            <div></div>
            <div className="mb-2">
              <Skeleton.Button active={true} />
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

export default CartLoading;
