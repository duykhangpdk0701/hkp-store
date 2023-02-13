import { Card, Divider, Skeleton } from "antd";
import React from "react";

const OrderItemLoading = () => {
  return (
    <Card>
      <div>
        <div className="flex justify-between mb-3">
          <div></div>
          <div>
            <span className="text-orange-500 uppercase font-light">
              <Skeleton.Button className="rounded-none" active={true} />
            </span>
          </div>
        </div>
        <Divider className="my-0" />
        <div className="flex mt-3">
          <div className="flex-1 mb-3 flex">
            <div>
              <Skeleton.Image active={true} className="w-20 h-20" />
            </div>
            <div className="ml-3">
              <div className="mb-2">
                <Skeleton.Input active={true} className="h-6 w-40" />
              </div>
              <div className="mb-2">
                <Skeleton.Button
                  className="rounded-none"
                  size="small"
                  active={true}
                />
              </div>
              <div>
                <Skeleton.Button
                  className="rounded-none"
                  size="small"
                  active={true}
                />
              </div>
            </div>
          </div>
          <div>
            <Skeleton.Button
              className="rounded-none"
              size="small"
              active={true}
            />
          </div>
        </div>
      </div>
      <Divider className="my-0" />
      <div className="mt-6 mb-6">
        <div className="flex justify-end items-center">
          <span className="mr-2 text-sm">
            <Skeleton.Button
              className="rounded-none"
              size="small"
              active={true}
            />
          </span>
          <span className="text-lg font-medium text-orange-500">
            <Skeleton.Button
              className="rounded-none"
              size="small"
              active={true}
            />
          </span>
        </div>
      </div>
      <div className="flex justify-between">
        <div></div>
        <div>
          <Skeleton.Button className="rounded-none" active={true} />
        </div>
      </div>
    </Card>
  );
};

export default OrderItemLoading;
